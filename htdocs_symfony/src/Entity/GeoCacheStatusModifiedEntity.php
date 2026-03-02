<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheStatusModifiedRepository;

#[ORM\Entity(repositoryClass: CacheStatusModifiedRepository::class)]
class GeoCacheStatusModifiedEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $cacheId = 0;

    #[ORM\Id]
    #[ORM\Column]
    public DateTime $dateModified;

    #[ORM\Column]
    public int $oldState;

    #[ORM\Column]
    public int $newState;

    #[ORM\Column]
    public int $userId;

    public UserEntity $user;

    public GeoCacheStatusEntity $cacheStatusOld;

    public GeoCacheStatusEntity $cacheStatusNew;

    public function isNew(): bool
    {
        return $this->cacheId === 0;
    }

    public function getCacheId(): ?int
    {
        return $this->cacheId;
    }

    public function getDateModified(): ?\DateTime
    {
        return $this->dateModified;
    }

    public function getOldState(): ?int
    {
        return $this->oldState;
    }

    public function setOldState(int $oldState): static
    {
        $this->oldState = $oldState;

        return $this;
    }

    public function getNewState(): ?int
    {
        return $this->newState;
    }

    public function setNewState(int $newState): static
    {
        $this->newState = $newState;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }
}
