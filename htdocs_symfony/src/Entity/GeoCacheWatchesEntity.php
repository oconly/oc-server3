<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheWatchesRepository;

#[ORM\Entity(repositoryClass: CacheWatchesRepository::class)]
class GeoCacheWatchesEntity extends AbstractEntity
{
    public int $cacheId = 0;

    public int $userId;

    public function isNew(): bool
    {
        return $this->cacheId === 0;
    }
}
