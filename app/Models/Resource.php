<?php

class Resource
{
    public function __construct(
        private int $id,
        private string $title,
        private string $type,
        private string $status,
        private ?string $borrower,
        private string $createdAt,

    ) {}

    public function getId(): int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getType(): string
    {
        return $this->type;
    }
    public function getStatus(): string
    {
        return $this->status;
    }
    public function getBorrower(): ?string
    {
        return $this->borrower;
    }
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
    public static function fromArray(array $row): self
    {
        return new self(
            (int) $row['id'],
            $row['title'],
            $row['type'],
            $row['status'],
            $row['borrower'] ?? null,
            $row['created_at'],
        );
    }
}
