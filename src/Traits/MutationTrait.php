<?php

namespace BusinessComponents\Traits;

use DateTime;

trait MutationTrait
{

    private $createdAt;
    private $updatedAt;
    private $deletedAt;

    public function setCreatedAt(DateTime $date = null)
    {
        if ($date === null) {
            $date = new DateTime();
        }
        $this->createdAt = $date;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(DateTime $date = null)
    {
        if ($date === null) {
            $date = new DateTime();
        }
        $this->updatedAt = $date;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setDeletedAt(DateTime $date = null)
    {
        if ($date === null) {
            $date = new DateTime();
        }
        $this->deletedAt = $date;
    }

    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function delete(DateTime $date = null)
    {
        $this->setDeletedAt($date);
        return $this;
    }

    public function isDeleted()
    {
        return null !== $this->deletedAt && new \DateTime() >= $this->deletedAt;
    }
}
