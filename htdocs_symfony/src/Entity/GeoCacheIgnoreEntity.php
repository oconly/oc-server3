<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;

#[ORM\Entity]
class GeoCacheIgnoreEntity extends AbstractEntity
{
    public int $cacheId = 0;

    public int $userId;

    public function isNew(): bool
    {
        return $this->cacheId === 0;
    }
}
