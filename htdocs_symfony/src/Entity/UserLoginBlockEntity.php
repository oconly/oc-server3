<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\UserLoginBlockRepository;

#[ORM\Entity(repositoryClass: UserLoginBlockRepository::class)]
class UserLoginBlockEntity extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column]
    public int $id = 0;

    #[ORM\Id]
    #[ORM\Column]
    public int $userId;

    #[ORM\Column]
    public string $loginBlockUntil;

    #[ORM\Column]
    public string $message;

    public function __construct(int $userId, string $loginBlockUntil, string $message)
    {
        $this->userId = $userId;
        $this->loginBlockUntil = $loginBlockUntil;
        $this->message = $message;
    }

    public function isNew(): bool
    {
        return $this->id === 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getLoginBlockUntil(): ?string
    {
        return $this->loginBlockUntil;
    }

    public function setLoginBlockUntil(string $loginBlockUntil): static
    {
        $this->loginBlockUntil = $loginBlockUntil;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
