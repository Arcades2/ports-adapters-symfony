<?php

namespace App\Infrastructure\Post\Controller;

use App\Application\Post\DTO\CreatePostRequestDTO;
use App\Domain\Post\Application\PostServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{
    #[Route('/posts', methods: ['POST'], name: 'app_create_post')]
    public function create(Request $request, PostServiceInterface $postService): JsonResponse
    {

        $data = $request->toArray();
        $createPostRequest = CreatePostRequestDTO::create(
            $data['content'],
            $data['link'],
            $data['authorId']
        );

        $postId = $postService->create($createPostRequest);

        return $this->json([
            'id' => $postId,
        ], 201);
    }
}
