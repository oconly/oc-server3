<?php

declare(strict_types=1);

namespace Oc\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Oc\Repository\AbstractEntity;

#[ORM\Entity]
class GeoCacheAdoptionsEntity extends AbstractEntity
{
    public int $id = 0;

    public int $cacheId;

    public DateTime $date;

    public int $fromUserId;

    public int $toUserId;

    public UserEntity $fromUser;

    public UserEntity $toUser;

    public function isNew(): bool
    {
        return $this->id === 0;
    }
}
