<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\NodesRepository;

#[ORM\Entity(repositoryClass: NodesRepository::class)]
class NodesEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public string $name;

    #[ORM\Column]
    public string $url;

    #[ORM\Column]
    public string $waypointPrefix;

    public function isNew(): bool
    {
        return $this->id === 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getWaypointPrefix(): ?string
    {
        return $this->waypointPrefix;
    }

    public function setWaypointPrefix(string $waypointPrefix): static
    {
        $this->waypointPrefix = $waypointPrefix;

        return $this;
    }
}
