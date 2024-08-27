<?php

namespace App\Infrastructure\Post\Service;

use App\Domain\Post\Post;
use App\Domain\Post\Service\ValidatorInterface as PostValidatorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator implements PostValidatorInterface
{

    public function __construct(private ValidatorInterface $validator) {}

    public function validate(Post $post): bool
    {
        $errors = $this->validator->validate($post);

        if (count($errors) > 0) {
            return false;
        }

        // custom validation


        return true;
    }
}
