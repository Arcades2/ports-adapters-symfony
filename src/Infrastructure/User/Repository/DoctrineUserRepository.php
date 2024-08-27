<?php

namespace App\Infrastructure\User\Repository;

use App\Domain\User\User;
use App\Domain\User\Repository\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class DoctrineUserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function get(int $id): ?User
    {
        return $this->find($id);
    }

    public function save(User $post): int
    {
        $this->getEntityManager()->persist($post);
        $this->getEntityManager()->flush();

        return $post->getId();
    }

    public function delete(int $userId): int
    {
        $em = $this->getEntityManager();

        $em->remove($this->find($userId));

        return $userId;
    }
}
