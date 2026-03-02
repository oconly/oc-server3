<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\SupportBonuscachesRepository;

#[ORM\Entity(repositoryClass: SupportBonuscachesRepository::class)]
class SupportBonuscachesEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public string $wpOc;

    #[ORM\Column]
    public bool $isBonusCache;

    #[ORM\Column]
    public string $belongsToBonusCache;

    public function __construct(string $wpOc = '', bool $isBonusCache = false, string $belongsToBonusCache = '')
    {
        $this->wpOc = $wpOc;
        $this->isBonusCache = $isBonusCache;
        $this->belongsToBonusCache = $belongsToBonusCache;
    }

    public function isNew(): bool
    {
        return $this->id === 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWpOc(): ?string
    {
        return $this->wpOc;
    }

    public function setWpOc(string $wpOc): static
    {
        $this->wpOc = $wpOc;

        return $this;
    }

    public function isBonusCache(): ?bool
    {
        return $this->isBonusCache;
    }

    public function setIsBonusCache(bool $isBonusCache): static
    {
        $this->isBonusCache = $isBonusCache;

        return $this;
    }

    public function getBelongsToBonusCache(): ?string
    {
        return $this->belongsToBonusCache;
    }

    public function setBelongsToBonusCache(string $belongsToBonusCache): static
    {
        $this->belongsToBonusCache = $belongsToBonusCache;

        return $this;
    }
}
