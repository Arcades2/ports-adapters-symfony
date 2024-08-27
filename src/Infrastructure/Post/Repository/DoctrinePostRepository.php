<?php

namespace App\Infrastructure\Post\Repository;

use App\Domain\Post\Post;
use App\Domain\Post\Repository\PostRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\Post\Service\ValidatorInterface;
use App\Domain\User\User;

/**
 * @extends ServiceEntityRepository<Post>
 */
class DoctrinePostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{

    public function __construct(ManagerRegistry $registry, private ValidatorInterface $validator)
    {
        parent::__construct($registry, Post::class);
    }

    public function create(string $content, string $link, User $author): Post
    {
        $post = Post::create([
            "content" => $content,
            "link" => $link,
            "author" => $author
        ]);

        if (!$this->validator->validate($post)) {
            throw new \InvalidArgumentException('Invalid post data');
        }

        return $post;
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
