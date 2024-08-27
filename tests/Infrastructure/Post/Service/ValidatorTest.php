<?php

namespace App\Tests\Infrastructure\Post\Service;

use App\Domain\Post\Post;
use App\Domain\User\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Infrastructure\Post\Service\Validator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorTest extends KernelTestCase
{
    private Validator $validator;

    public function setUp(): void
    {
        self::bootKernel();

        $container = self::getContainer();
        $validatorService = $container->get(ValidatorInterface::class);

        $this->validator = new Validator($validatorService);
    }

    public function testValidPost(): void
    {
        $post = new Post(
            'content',
            'https://www.youtube.com/watch?v=GU21qYF',
            new User('test', 'lastname', 'firsname'),
            new \DateTime()
        );

        $this->assertTrue($this->validator->validate($post));
    }

    public function testInValidPost(): void
    {
        $post = new Post(
            '',
            'https://www.youtube.com/watch?v=GU21qYF',
            new User('test', 'lastname', 'firsname'),
            new \DateTime()
        );

        $this->assertFalse($this->validator->validate($post));
    }
}
