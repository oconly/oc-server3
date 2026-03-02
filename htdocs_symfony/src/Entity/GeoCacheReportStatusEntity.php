<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheReportStatusRepository;

#[ORM\Entity(repositoryClass: CacheReportStatusRepository::class)]
class GeoCacheReportStatusEntity extends AbstractEntity
{
    public int $id = 0;

    public string $name;

    public int $transId;

    public function isNew(): bool
    {
        return $this->id === 0;
    }
}
