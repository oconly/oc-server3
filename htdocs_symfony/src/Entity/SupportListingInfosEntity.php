<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\SupportListingInfosRepository;

#[ORM\Entity(repositoryClass: SupportListingInfosRepository::class)]
class SupportListingInfosEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public string $wpOc;

    #[ORM\Column]
    public int $nodeId;

    #[ORM\Column]
    public string $nodeOwnerId;

    #[ORM\Column]
    public string $nodeListingId;

    #[ORM\Column]
    public string $nodeListingWp;

    #[ORM\Column]
    public string $nodeListingName;

    #[ORM\Column]
    public int $nodeListingSize;

    #[ORM\Column]
    public int $nodeListingDifficulty;

    #[ORM\Column]
    public int $nodeListingTerrain;

    #[ORM\Column]
    public float $nodeListingCoordinatesLon;

    #[ORM\Column]
    public float $nodeListingCoordinatesLat;

    #[ORM\Column]
    public bool $nodeListingAvailable;

    #[ORM\Column]
    public bool $nodeListingArchived;

    #[ORM\Column]
    public DateTime $lastModified;

    #[ORM\Column]
    public int $importStatus;

    public NodesEntity $node;

    public function isNew(): bool
    {
        return $this->id === 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWpOc(): ?string
    {
        return $this->wpOc;
    }

    public function setWpOc(string $wpOc): static
    {
        $this->wpOc = $wpOc;

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

    public function getNodeOwnerId(): ?string
    {
        return $this->nodeOwnerId;
    }

    public function setNodeOwnerId(string $nodeOwnerId): static
    {
        $this->nodeOwnerId = $nodeOwnerId;

        return $this;
    }

    public function getNodeListingId(): ?string
    {
        return $this->nodeListingId;
    }

    public function setNodeListingId(string $nodeListingId): static
    {
        $this->nodeListingId = $nodeListingId;

        return $this;
    }

    public function getNodeListingWp(): ?string
    {
        return $this->nodeListingWp;
    }

    public function setNodeListingWp(string $nodeListingWp): static
    {
        $this->nodeListingWp = $nodeListingWp;

        return $this;
    }

    public function getNodeListingName(): ?string
    {
        return $this->nodeListingName;
    }

    public function setNodeListingName(string $nodeListingName): static
    {
        $this->nodeListingName = $nodeListingName;

        return $this;
    }

    public function getNodeListingSize(): ?int
    {
        return $this->nodeListingSize;
    }

    public function setNodeListingSize(int $nodeListingSize): static
    {
        $this->nodeListingSize = $nodeListingSize;

        return $this;
    }

    public function getNodeListingDifficulty(): ?int
    {
        return $this->nodeListingDifficulty;
    }

    public function setNodeListingDifficulty(int $nodeListingDifficulty): static
    {
        $this->nodeListingDifficulty = $nodeListingDifficulty;

        return $this;
    }

    public function getNodeListingTerrain(): ?int
    {
        return $this->nodeListingTerrain;
    }

    public function setNodeListingTerrain(int $nodeListingTerrain): static
    {
        $this->nodeListingTerrain = $nodeListingTerrain;

        return $this;
    }

    public function getNodeListingCoordinatesLon(): ?float
    {
        return $this->nodeListingCoordinatesLon;
    }

    public function setNodeListingCoordinatesLon(float $nodeListingCoordinatesLon): static
    {
        $this->nodeListingCoordinatesLon = $nodeListingCoordinatesLon;

        return $this;
    }

    public function getNodeListingCoordinatesLat(): ?float
    {
        return $this->nodeListingCoordinatesLat;
    }

    public function setNodeListingCoordinatesLat(float $nodeListingCoordinatesLat): static
    {
        $this->nodeListingCoordinatesLat = $nodeListingCoordinatesLat;

        return $this;
    }

    public function isNodeListingAvailable(): ?bool
    {
        return $this->nodeListingAvailable;
    }

    public function setNodeListingAvailable(bool $nodeListingAvailable): static
    {
        $this->nodeListingAvailable = $nodeListingAvailable;

        return $this;
    }

    public function isNodeListingArchived(): ?bool
    {
        return $this->nodeListingArchived;
    }

    public function setNodeListingArchived(bool $nodeListingArchived): static
    {
        $this->nodeListingArchived = $nodeListingArchived;

        return $this;
    }

    public function getLastModified(): ?\DateTime
    {
        return $this->lastModified;
    }

    public function setLastModified(\DateTime $lastModified): static
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getImportStatus(): ?int
    {
        return $this->importStatus;
    }

    public function setImportStatus(int $importStatus): static
    {
        $this->importStatus = $importStatus;

        return $this;
    }
}
