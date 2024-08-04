<?php

namespace App\Application\Post\DTO;

class CreatePostRequestDTO
{
    static public function create(string $content, string $link, int $authorId): self
    {
        return new self($content, $link, $authorId);
    }

    public function __construct(
        private string $content,
        private string $link,
        private int $authorId
    ) {}

    public function getContent(): string
    {
        return $this->content;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }
}
