<?php

namespace App\Tests\Domain\Post;

use PHPUnit\Framework\TestCase;
use App\Domain\Post\Post;
use App\Domain\User\User;

class PostTest extends TestCase
{
    public function testCreatePost(): void
    {
        $post = Post::create(
            [
                'content' => "content",
                'link' => 'link',
                'author' => new User(
                    'test',
                    'lastname',
                    'firstname'
                ),
            ]
        );

        $this->assertEquals('content', $post->getContent());
        $this->assertEquals('link', $post->getLink());
        $this->assertInstanceOf(User::class, $post->getAuthor());
        $this->assertInstanceOf(\DateTime::class, $post->getCreatedAt());
    }
}
