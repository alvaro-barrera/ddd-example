<?php


namespace Src\BoundedContext\User\Application;


use Illuminate\Support\Facades\Log;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\Contracts\UserRepository;
use Src\BoundedContext\User\Domain\UserEntity;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;

final class StoreUserUseCase
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function executive(string $name, string $email, string $password): void
    {
        $user_name = new UserName($name);
        $user_email = new UserEmail($email);
        $user_password = new UserPassword($password);
        $user = UserEntity::create($user_name, $user_email, $user_password);
        $this->repository->save($user);
    }
}
