<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheCoordinatesRepository;

#[ORM\Entity(repositoryClass: CacheCoordinatesRepository::class)]
class GeoCacheCoordinatesEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public DateTime $dateCreated;

    #[ORM\Column]
    public int $cacheId;

    #[ORM\Column]
    public float $longitude;

    #[ORM\Column]
    public float $latitude;

    #[ORM\Column]
    public int $restoredBy;

    public UserEntity $user;

    public function isNew(): bool
    {
        return $this->id === 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreated(): ?\DateTime
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTime $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getCacheId(): ?int
    {
        return $this->cacheId;
    }

    public function setCacheId(int $cacheId): static
    {
        $this->cacheId = $cacheId;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getRestoredBy(): ?int
    {
        return $this->restoredBy;
    }

    public function setRestoredBy(int $restoredBy): static
    {
        $this->restoredBy = $restoredBy;

        return $this;
    }
}
