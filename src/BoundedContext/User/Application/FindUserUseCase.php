<?php


namespace Src\BoundedContext\User\Application;


use Src\BoundedContext\User\Domain\Contracts\UserRepository;
use Src\BoundedContext\User\Domain\UserEntity;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

final class FindUserUseCase
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function executive(int $id): ?UserRepository
    {
        $response = $this->repository->search(new UserId($id));
        return UserEntity::from_array($response);
    }

}
