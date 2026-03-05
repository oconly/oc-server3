<?php
/***************************************************************************
 * for license information see LICENSE.md
 ***************************************************************************/

namespace Oc\Libse\CacheNote;

use Oc\Libse\Coordinate\CoordinateCoordinate;
use Oc\Libse\Coordinate\PresenterCoordinate;
use Oc\Libse\Validator\AlwaysValidValidator;

class PresenterCacheNote
{
    const req_note = 'note';
    const req_incl_coord = 'incl_coord';
    const tpl_cache_id = 'cacheid';
    const tpl_note_id = 'noteid';
    const tpl_note = 'note';
    const tpl_incl_coord = 'inclCoord';
    const image = 'resource2/ocstyle/images/misc/wp_note.png';

    private $request;
    private $coordinate;
    private $userId;
    private $noteId;
    private $cacheId;
    private $note;
    private $cacheNoteHandler;
    private $latitude = 0;
    private $longitude = 0;
    private $directCoordinate;

    public function __construct($request = false, $translator = false)
    {
        $this->request = $request;
        $this->coordinate = new PresenterCoordinate($this->request, $translator);
    }

    public function init($cacheNoteHandler, $userId, $cacheId): void
    {
        $this->cacheNoteHandler = $cacheNoteHandler;
        $this->userId = $userId;
        $this->cacheId = $cacheId;

        $cacheNote = $cacheNoteHandler->getCacheNote($userId, $cacheId);
        if ($cacheNote) {
            $this->noteId = $cacheNote['id'];
            $this->note = $cacheNote['note'];
            $this->latitude = $cacheNote['latitude'];
            $this->longitude = $cacheNote['longitude'];
            $this->coordinate->init($this->latitude, $this->longitude);
        }
    }

    /**
     * @param \OcSmarty $template
     */
    public function prepare($template): void
    {
        $template->assign(self::tpl_note_id, $this->noteId);
        $template->assign(self::tpl_cache_id, $this->cacheId);
        $template->assign(self::tpl_note, $this->getNote());
        $template->assign(self::tpl_incl_coord, $this->coordinate->hasCoordinate());
        $template->assign('coord_latitude', $this->latitude);
        $template->assign('coord_longitude', $this->longitude);
        $this->coordinate->prepare($template);
    }

    public function validate()
    {
        $this->request->validate(self::req_incl_coord, new AlwaysValidValidator());
        $this->request->validate(self::req_note, new AlwaysValidValidator());

        if ($this->includeCoordinate()) {
            $lat = $this->request->getForValidation('latitude');
            $lon = $this->request->getForValidation('longitude');
            if ($lat !== null && $lat !== '' && $lon !== null && $lon !== '') {
                $lat = (float) $lat;
                $lon = (float) $lon;
                try {
                    $this->directCoordinate = new CoordinateCoordinate($lat, $lon);
                    $this->latitude = $lat;
                    $this->longitude = $lon;
                    $this->coordinate->init($lat, $lon);
                } catch (\InvalidArgumentException $e) {
                    $this->coordinate->validate();
                }
            } else {
                $this->coordinate->validate();
            }
        } else {
            $this->coordinate->init(0, 0);
        }

        return true;
    }

    public function doSubmit(): void
    {
        $coordinate = $this->getCoordinate();

        $this->cacheNoteHandler->save(
            $this->noteId,
            $this->userId,
            $this->cacheId,
            $this->getNote(),
            $coordinate->latitude(),
            $coordinate->longitude()
        );
    }

    private function getNote()
    {
        return $this->request->get(self::req_note, $this->note);
    }

    private function getCoordinate()
    {
        if ($this->includeCoordinate()) {
            if ($this->directCoordinate) {
                return $this->directCoordinate;
            }
            return $this->coordinate->getCoordinate();
        }

        return new CoordinateCoordinate(0, 0);
    }

    private function includeCoordinate()
    {
        return $this->request->get(self::req_incl_coord);
    }
}
