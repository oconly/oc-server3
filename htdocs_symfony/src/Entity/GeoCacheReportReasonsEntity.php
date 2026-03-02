<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheReportReasonsRepository;

#[ORM\Entity(repositoryClass: CacheReportReasonsRepository::class)]
class GeoCacheReportReasonsEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public string $name;

    #[ORM\Column]
    public int $transId;

    #[ORM\Column]
    public int $order;

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

    public function getTransId(): ?int
    {
        return $this->transId;
    }

    public function setTransId(int $transId): static
    {
        $this->transId = $transId;

        return $this;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(int $order): static
    {
        $this->order = $order;

        return $this;
    }
}
