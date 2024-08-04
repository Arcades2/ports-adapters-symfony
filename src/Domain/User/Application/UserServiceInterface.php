<?php

namespace App\Domain\User\Application;

use App\Application\User\DTO\CreateUserRequestDTO;
use App\Domain\User\User;

interface UserServiceInterface
{
    /**
     * @param CreateUserRequestDTO $CreateUserRequestDTO
     * @return int
     */
    public function create(CreateUserRequestDTO $request): int;

    /**
     * @param int $id
     * @return User|null
     */
    public function find(int $id): ?User;
}
