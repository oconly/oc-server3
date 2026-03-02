<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheVisitsRepository;

#[ORM\Entity(repositoryClass: CacheVisitsRepository::class)]
class GeoCacheVisitsEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $cacheId = 0;

    #[ORM\Id]
    #[ORM\Column]
    public int $userIdIP;

    #[ORM\Column]
    public int $count;

    /** @var DateTime */
    public DateTime $lastModified;

    public function isNew(): bool
    {
        return $this->cacheId === 0;
    }

    public function getCacheId(): ?int
    {
        return $this->cacheId;
    }

    public function getUserIdIP(): ?int
    {
        return $this->userIdIP;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }
}
