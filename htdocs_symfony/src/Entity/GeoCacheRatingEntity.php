<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheRatingRepository;

#[ORM\Entity(repositoryClass: CacheRatingRepository::class)]
class GeoCacheRatingEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $cacheId = 0;

    #[ORM\Id]
    #[ORM\Column]
    public int $userId;

    #[ORM\Column]
    public DateTime $ratingDate;

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

    public function getRatingDate(): ?\DateTime
    {
        return $this->ratingDate;
    }

    public function setRatingDate(\DateTime $ratingDate): static
    {
        $this->ratingDate = $ratingDate;

        return $this;
    }
}
