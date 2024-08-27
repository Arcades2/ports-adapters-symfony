<?php

namespace App\Domain\Post;

use App\Domain\User\User;
use DateTimeInterface;

class Post
{

    private int $id;

    /**
     * @param array{
     *  content: string,
     *  link: string,
     *  author: User
     * } $data
     */
    static function create(array $data): Post
    {
        return new self(
            $data['content'],
            $data['link'],
            $data['author'],
            new \DateTime()
        );
    }

    /**
     * @param string $content
     * @param string $link
     * @param User $author
     * @param DateTimeInterface $createdAt
     */
    public function __construct(
        private string $content,
        private string $link,
        private User $author,
        private DateTimeInterface $createdAt
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }
}
