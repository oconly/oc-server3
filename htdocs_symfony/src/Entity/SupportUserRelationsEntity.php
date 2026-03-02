<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\SupportUserRelationsRepository;

#[ORM\Entity(repositoryClass: SupportUserRelationsRepository::class)]
class SupportUserRelationsEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public int $ocUserId;

    #[ORM\Column]
    public int $nodeId;

    #[ORM\Column]
    public string $nodeUserId;

    #[ORM\Column]
    public string $nodeUsername;

    public UserEntity $user;

    public NodesEntity $node;

    public function isNew(): bool
    {
        return $this->id === 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOcUserId(): ?int
    {
        return $this->ocUserId;
    }

    public function setOcUserId(int $ocUserId): static
    {
        $this->ocUserId = $ocUserId;

        return $this;
    }

    public function getNodeId(): ?int
    {
        return $this->nodeId;
    }

    public function setNodeId(int $nodeId): static
    {
        $this->nodeId = $nodeId;

        return $this;
    }

    public function getNodeUserId(): ?string
    {
        return $this->nodeUserId;
    }

    public function setNodeUserId(string $nodeUserId): static
    {
        $this->nodeUserId = $nodeUserId;

        return $this;
    }

    public function getNodeUsername(): ?string
    {
        return $this->nodeUsername;
    }

    public function setNodeUsername(string $nodeUsername): static
    {
        $this->nodeUsername = $nodeUsername;

        return $this;
    }
}
