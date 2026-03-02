<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CachesAttributesRepository;

#[ORM\Entity(repositoryClass: CachesAttributesRepository::class)]
class GeoCachesAttributesEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    public int $cacheId = 0;

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    public int $attribId;

    public function isNew() :bool
    {
        return $this->cacheId === 0;
    }

    public function getCacheId(): ?int
    {
        return $this->cacheId;
    }

    public function getAttribId(): ?int
    {
        return $this->attribId;
    }
}
