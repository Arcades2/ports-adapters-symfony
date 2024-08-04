<?php

namespace App\Domain\Post\Repository;

use App\Domain\Post\Post;
use App\Domain\User\User;

interface PostRepositoryInterface
{

    public function create(string $content, string $link, User $author): Post;

    /**
     * @return Post[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Post|null
     */
    public function get(int $id): ?Post;

    /**
     * @param Post $post
     * @return int
     */
    public function save(Post $post): int;

    /**
     * @param int $postId
     * @return int
     */
    public function delete(int $postId): int;
}
