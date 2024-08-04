<?php

namespace App\Application\User;

use App\Application\User\DTO\CreateUserRequestDTO;
use App\Domain\User\Application\UserServiceInterface;
use App\Domain\User\Repository\UserRepositoryInterface;
use App\Domain\User\User;

class UserService implements UserServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function create(CreateUserRequestDTO $request): int
    {
        $user = new User(
            $request->getEmail(),
            $request->getFirstName(),
            $request->getLastName(),
        );

        $userId = $this->userRepository->save($user);

        return $userId;
    }

    public function find(int $id): ?User
    {
        return $this->userRepository->find($id);
    }
}
