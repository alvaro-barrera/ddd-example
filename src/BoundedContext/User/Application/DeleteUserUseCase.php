<?php


namespace Src\BoundedContext\User\Application;


use Src\BoundedContext\User\Domain\Contracts\UserRepository;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

class DeleteUserUseCase
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function executive(int $id): void
    {
        $user_id = new UserId($id);
        $this->repository->delete($user_id);
    }
}
