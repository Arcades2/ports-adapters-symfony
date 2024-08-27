<?php

namespace App\Domain\Post\Application;

use App\Application\Post\DTO\CreatePostRequestDTO;

interface PostServiceInterface
{
    /**
     * create a new post
     *
     * @param CreatePostRequestDTO $request
     * @return int
     */
    public function create(CreatePostRequestDTO $request): int;
}
