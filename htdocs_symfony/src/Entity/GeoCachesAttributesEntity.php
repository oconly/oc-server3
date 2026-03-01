<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;

#[ORM\Entity]
class GeoCachesAttributesEntity extends AbstractEntity
{
    public int $cacheId = 0;

    public int $attribId;

    public function isNew() :bool
    {
        return $this->cacheId === 0;
    }
}
