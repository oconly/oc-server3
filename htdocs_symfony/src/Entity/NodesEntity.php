<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\NodesRepository;

#[ORM\Entity(repositoryClass: NodesRepository::class)]
class NodesEntity extends AbstractEntity
{
    public int $id = 0;

    public string $name;

    public string $url;

    public string $waypointPrefix;

    public function isNew(): bool
    {
        return $this->id === 0;
    }
}
