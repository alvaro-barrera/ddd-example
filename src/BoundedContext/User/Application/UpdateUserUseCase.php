<?php


namespace Src\BoundedContext\User\Application;


use Src\BoundedContext\User\Domain\Contracts\UserRepository;
use Src\BoundedContext\User\Domain\UserEntity;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;

final class UpdateUserUseCase
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        $this->finder = new FindUserUseCase($this->repository);
    }

    public function executive(int $id, string $name, string $email, ?string $password): void
    {
        $user_id = new UserId($id);
        $user_name = new UserName($name);
        $user_email = new UserEmail($email);
        $user_password = new UserPassword($password);
        $user = UserEntity::create($user_name, $user_email, $user_password);

        $this->repository->update($user_id, $user);
    }

}
