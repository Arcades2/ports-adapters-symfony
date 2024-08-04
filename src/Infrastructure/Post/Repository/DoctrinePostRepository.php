<?php

namespace App\Infrastructure\Post\Repository;

use App\Domain\Post\Post;
use App\Domain\Post\Repository\PostRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;

class DoctrinePostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function create(string $content, string $link, $author): Post
    {
        return new Post($content, $link, $author, new \DateTimeImmutable(), new ArrayCollection());
    }

    public function get(int $id): ?Post
    {
        return $this->find($id);
    }

    public function save(Post $post): int
    {
        $this->getEntityManager()->persist($post);
        $this->getEntityManager()->flush();

        return $post->getId();
    }

    public function delete(int $postId): int
    {
        $em = $this->getEntityManager();

        $em->remove($this->find($postId));

        return $postId;
    }
}
