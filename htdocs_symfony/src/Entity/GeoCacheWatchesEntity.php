<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheWatchesRepository;

#[ORM\Entity(repositoryClass: CacheWatchesRepository::class)]
class GeoCacheWatchesEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $cacheId = 0;

    #[ORM\Id]
    #[ORM\Column]
    public int $userId;

    public function isNew(): bool
    {
        return $this->cacheId === 0;
    }

    public function getCacheId(): ?int
    {
        return $this->cacheId;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }
}
