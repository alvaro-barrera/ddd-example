<?php


namespace Src\BoundedContext\User\Domain\Contracts;

use Src\BoundedContext\User\Domain\UserEntity;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

interface UserRepository
{
    public function search(UserId $user_id): array;

    public function save(UserEntity $user): void;

    public function update(UserId $id, UserEntity $user): void;

    public function delete(UserId $id): void;

    public function restore(UserId $id): void;
}
