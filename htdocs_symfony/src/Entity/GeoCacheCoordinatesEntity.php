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
    public int $id = 0;

    public DateTime $dateCreated;

    public int $cacheId;

    public float $longitude;

    public float $latitude;

    public int $restoredBy;

    public UserEntity $user;

    public function isNew(): bool
    {
        return $this->id === 0;
    }
}
