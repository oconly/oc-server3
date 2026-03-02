<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\SupportUserRelationsRepository;

#[ORM\Entity(repositoryClass: SupportUserRelationsRepository::class)]
class SupportUserRelationsEntity extends AbstractEntity
{
    public int $id = 0;

    public int $ocUserId;

    public int $nodeId;

    public string $nodeUserId;

    public string $nodeUsername;

    public UserEntity $user;

    public NodesEntity $node;

    public function isNew(): bool
    {
        return $this->id === 0;
    }
}
