<?php

namespace App\Domain\User;

use App\Domain\Post\Post;

class User
{
    private int $id;

    /**
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param iterable<Post> $posts
     */
    public function __construct(
        private string $email,
        private string $firstName,
        private string $lastName,
        private iterable $posts = []
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return iterable<Post>
     */
    public function getPosts(): iterable
    {
        return $this->posts;
    }
}
