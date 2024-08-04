<?php

namespace App\Application\User\DTO;

class CreateUserRequestDTO
{
    static public function create(string $email, string $firstName, string $lastName): self
    {
        return new self($email, $firstName, $lastName);
    }

    public function __construct(
        private string $email,
        private string $firstName,
        private string $lastName
    ) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
