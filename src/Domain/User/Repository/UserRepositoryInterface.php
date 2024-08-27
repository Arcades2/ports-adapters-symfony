<?php

namespace App\Domain\User\Repository;

use App\Domain\User\User;
use Doctrine\Persistence\ObjectRepository;

/**
 * @extends ObjectRepository<User>
 */
interface UserRepositoryInterface extends ObjectRepository
{
    /**
     * @return User[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User|null
     */
    public function get(int $id): ?User;

    /**
     * @param User $user
     * @return int
     */
    public function save(User $user): int;

    /**
     * @param int $userId
     * @return int
     */
    public function delete(int $userId): int;
}
