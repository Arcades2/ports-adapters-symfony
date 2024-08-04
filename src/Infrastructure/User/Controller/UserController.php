<?php

namespace App\Infrastructure\User\Controller;

use App\Application\User\DTO\CreateUserRequestDTO;
use App\Domain\User\Application\UserServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/users', methods: ['POST'], name: 'app_create_user')]
    public function create(Request $request, UserServiceInterface $userService): JsonResponse
    {

        $data = $request->toArray();
        $createUserRequest = CreateUserRequestDTO::create(
            $data['email'],
            $data['firstName'],
            $data['lastName']
        );

        $userId = $userService->create($createUserRequest);

        return $this->json([
            'id' => $userId,
        ], 201);
    }

    #[Route('/users/{id}', methods: ['GET'], name: 'app_get_user')]
    public function get(int $id, UserServiceInterface $userService): JsonResponse
    {
        $user = $userService->find($id);

        if ($user === null) {
            return $this->json([
                'message' => 'User not found',
            ], 404);
        }

        return $this->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
        ]);
    }
}
