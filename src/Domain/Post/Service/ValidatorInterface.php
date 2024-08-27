<?php

namespace App\Domain\Post\Service;

use App\Domain\Post\Post;

interface ValidatorInterface
{
    public function validate(Post $post): bool;
}
