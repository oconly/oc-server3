<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CachesAttributesRepository;

#[ORM\Entity(repositoryClass: CachesAttributesRepository::class)]
class GeoCachesAttributesEntity extends AbstractEntity
{
    public int $cacheId = 0;

    public int $attribId;

    public function isNew() :bool
    {
        return $this->cacheId === 0;
    }
}
