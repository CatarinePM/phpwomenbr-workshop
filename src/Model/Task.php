<?php declare (strict_types = 1);
namespace App\Model;

class Task implements \JsonSerializable
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $title;

    /** @var int */
    protected $status;

    /** @var \DateTime */
    protected $expires;

    public const STATUS_ACTIVE = 1;
    public const STATUS_DONE = 0;
    public const STATUS_ARCHIVED = -1;

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle():?string
    {
        return $this->title;
    }

    public function setTitle(string $title):self
    {
        $this->title = $title;
        return $this;
    }

    public function getStatus():?int
    {
        return $this->status;
    }

    public function setStatus(int $status):self
    {
        $this->status = $status;
        return $this;
    }

    public function getExpires():?\DateTime
    {
        return $this->expires;
    }

    public function setExpires(\DateTime $expires):self
    {
        $this->expires = $expires;
        return $this;
    }

    public function jsonSerialize()
    {
        return \get_object_vars($this);
    }
}
