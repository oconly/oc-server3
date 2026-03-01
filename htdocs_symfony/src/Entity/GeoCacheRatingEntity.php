<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;

#[ORM\Entity]
class GeoCacheRatingEntity extends AbstractEntity
{
    public int $cacheId = 0;

    public int $userId;

    public DateTime $ratingDate;

    public function isNew(): bool
    {
        return $this->cacheId === 0;
    }
}
