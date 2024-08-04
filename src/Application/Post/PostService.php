<?php

namespace App\Application\Post;

use App\Application\Post\DTO\CreatePostRequestDTO;
use App\Domain\Post\Application\PostServiceInterface;
use App\Domain\Post\Repository\PostRepositoryInterface;
use App\Domain\User\Application\UserServiceInterface;

class PostService implements PostServiceInterface
{
    public function __construct(
        private PostRepositoryInterface $postRepository,
        private UserServiceInterface $userService
    ) {}

    public function create(CreatePostRequestDTO $request): int
    {

        $user = $this->userService->find($request->getAuthorId());

        $post = $this->postRepository->create(
            $request->getContent(),
            $request->getLink(),
            $user,
        );
        $postId = $this->postRepository->save($post);

        return $postId;
    }
}
