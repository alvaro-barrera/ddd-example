<?php


namespace Src\BoundedContext\User\Infrastucture;


use App\User as EloquentUser;

use Src\BoundedContext\User\Domain\Contracts\UserRepository;
use Src\BoundedContext\User\Domain\UserEntity;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

final class EloquentUserRepository implements UserRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new EloquentUser();
    }

    public function save(UserEntity $user): void
    {
        $this->model->fill($user->to_array());
        $this->model->save();
    }

    public function update(UserId $id, UserEntity $user): void
    {
        $data = [
            'name' => $user->name()->value(),
            'email' => $user->email()->value(),
        ];
        $this->model->findOrFail($id->value())->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->model->findOrFail($id->value())->delete();
    }

    public function restore(UserId $id): void
    {
        $this->model->withTrashed()->findOrFail($id->value())->restore();
    }

    public function search(UserId $userId): array
    {
        return $this->model->findOrFail($userId->value())->toArray();
    }
}
