<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\SecurityRoleHierarchyRepository;

#[ORM\Entity(repositoryClass: SecurityRoleHierarchyRepository::class)]
class SecurityRoleHierarchyEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $roleId = 0;

    #[ORM\Id]
    #[ORM\Column]
    public int $subRoleId;

    public function isNew(): bool
    {
        return $this->roleId === 0;
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function getSubRoleId(): ?int
    {
        return $this->subRoleId;
    }
}
