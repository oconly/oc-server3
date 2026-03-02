<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\CacheLogsRepository;

#[ORM\Entity(repositoryClass: CacheLogsRepository::class)]
class GeoCacheLogsEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public string $uuid;

    #[ORM\Column]
    public int $node;

    #[ORM\Column]
    public DateTime $dateCreated;

    #[ORM\Column]
    public DateTime $entryLastModified;

    #[ORM\Column]
    public DateTime $lastModified;

    #[ORM\Column]
    public string $okapiSyncbase;

    #[ORM\Column]
    public DateTime $logLastModified;

    #[ORM\Column]
    public int $cacheId;

    #[ORM\Column]
    public int $userId;

    #[ORM\Column]
    public int $type;

    #[ORM\Column]
    public int $ocTeamComment;

    #[ORM\Column]
    public DateTime $date;

    #[ORM\Column]
    public DateTime $orderDate;

    #[ORM\Column]
    public int $needsMaintenance;

    #[ORM\Column]
    public int $listingOutdated;

    #[ORM\Column]
    public string $text;

    #[ORM\Column]
    public int $textHtml;

    #[ORM\Column]
    public int $textHtmledit;

    #[ORM\Column]
    public int $ownerNotified;

    #[ORM\Column]
    public int $picture;

    #[ORM\Column]
    public bool $gdprDeletion;

    public LogTypesEntity $logType;

    public UserEntity $user;

    public array $pictures;

    public bool $ratingCacheLog;

    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    public function isNew(): bool
    {
        return $this->id === 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getNode(): ?int
    {
        return $this->node;
    }

    public function setNode(int $node): static
    {
        $this->node = $node;

        return $this;
    }

    public function getDateCreated(): ?\DateTime
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTime $dateCreated): static
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function getEntryLastModified(): ?\DateTime
    {
        return $this->entryLastModified;
    }

    public function setEntryLastModified(\DateTime $entryLastModified): static
    {
        $this->entryLastModified = $entryLastModified;

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

    public function getOkapiSyncbase(): ?string
    {
        return $this->okapiSyncbase;
    }

    public function setOkapiSyncbase(string $okapiSyncbase): static
    {
        $this->okapiSyncbase = $okapiSyncbase;

        return $this;
    }

    public function getLogLastModified(): ?\DateTime
    {
        return $this->logLastModified;
    }

    public function setLogLastModified(\DateTime $logLastModified): static
    {
        $this->logLastModified = $logLastModified;

        return $this;
    }

    public function getCacheId(): ?int
    {
        return $this->cacheId;
    }

    public function setCacheId(int $cacheId): static
    {
        $this->cacheId = $cacheId;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getOcTeamComment(): ?int
    {
        return $this->ocTeamComment;
    }

    public function setOcTeamComment(int $ocTeamComment): static
    {
        $this->ocTeamComment = $ocTeamComment;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getOrderDate(): ?\DateTime
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTime $orderDate): static
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getNeedsMaintenance(): ?int
    {
        return $this->needsMaintenance;
    }

    public function setNeedsMaintenance(int $needsMaintenance): static
    {
        $this->needsMaintenance = $needsMaintenance;

        return $this;
    }

    public function getListingOutdated(): ?int
    {
        return $this->listingOutdated;
    }

    public function setListingOutdated(int $listingOutdated): static
    {
        $this->listingOutdated = $listingOutdated;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getTextHtml(): ?int
    {
        return $this->textHtml;
    }

    public function setTextHtml(int $textHtml): static
    {
        $this->textHtml = $textHtml;

        return $this;
    }

    public function getTextHtmledit(): ?int
    {
        return $this->textHtmledit;
    }

    public function setTextHtmledit(int $textHtmledit): static
    {
        $this->textHtmledit = $textHtmledit;

        return $this;
    }

    public function getOwnerNotified(): ?int
    {
        return $this->ownerNotified;
    }

    public function setOwnerNotified(int $ownerNotified): static
    {
        $this->ownerNotified = $ownerNotified;

        return $this;
    }

    public function getPicture(): ?int
    {
        return $this->picture;
    }

    public function setPicture(int $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function isGdprDeletion(): ?bool
    {
        return $this->gdprDeletion;
    }

    public function setGdprDeletion(bool $gdprDeletion): static
    {
        $this->gdprDeletion = $gdprDeletion;

        return $this;
    }
}
