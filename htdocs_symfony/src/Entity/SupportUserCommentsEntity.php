<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\SupportUserCommentsRepository;

#[ORM\Entity(repositoryClass: SupportUserCommentsRepository::class)]
class SupportUserCommentsEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Column]
    public int $ocUserId;

    #[ORM\Column]
    public string $comment;

    #[ORM\Column]
    public string $commentCreated;

    #[ORM\Column]
    public string $commentLastModified;

    public UserEntity $user;

    public function __construct(int $ocUserId, string $comment = '')
    {
        $this->ocUserId = $ocUserId;
        $this->comment = $comment;
        $this->commentCreated = date('Y-m-d H:i:s');
        $this->commentLastModified = date('Y-m-d H:i:s');
    }

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCommentCreated(): ?string
    {
        return $this->commentCreated;
    }

    public function setCommentCreated(string $commentCreated): static
    {
        $this->commentCreated = $commentCreated;

        return $this;
    }

    public function getCommentLastModified(): ?string
    {
        return $this->commentLastModified;
    }

    public function setCommentLastModified(string $commentLastModified): static
    {
        $this->commentLastModified = $commentLastModified;

        return $this;
    }
}
