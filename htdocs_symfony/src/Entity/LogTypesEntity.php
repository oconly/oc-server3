<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\LogTypesRepository;

#[ORM\Entity(repositoryClass: LogTypesRepository::class)]
class LogTypesEntity extends AbstractEntity
{
    public int $id = 0;

    public string $name;

    public int $transId;

    public string $permission;

    public int $cacheStatus;

    public string $de;

    public string $en;

    public string $iconSmall;

    public int $allowRating;

    public int $requirePassword;

    public int $maintenanceLogs;

    public function isNew(): bool
    {
        return $this->id === 0;
    }
}
