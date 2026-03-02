<?php

declare(strict_types=1);

namespace Oc\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;
use Oc\Repository\UserLoginBlockRepository;

#[ORM\Entity(repositoryClass: UserLoginBlockRepository::class)]
class UserLoginBlockEntity extends AbstractEntity
{
    public int $id = 0;

    public int $userId;

    public string $loginBlockUntil;

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
}
