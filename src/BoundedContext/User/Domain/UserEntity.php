<?php


namespace Src\BoundedContext\User\Domain;


use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;

final class UserEntity
{
    private UserId $id;
    private UserName $name;
    private UserEmail $email;
    private UserPassword $password;

    public function __construct(/*UserId $id,*/ UserName $name, UserEmail $email, UserPassword $password)
    {
//        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function to_array(): array
    {
        return [
            'name' => $this->name()->value(),
            'email' => $this->email()->value(),
            'password' => $this->password()->value(),
        ];
    }

    public static function from_array(array $data): self
    {
        return new self(
            new UserId($data['id']),
            new UserName($data['name']),
            new UserEmail($data['email']),
        );
    }
//    public function id(): UserId
//    {
//        return $this->id;
//    }
    public static function create(UserName $name, UserEmail $email, UserPassword $password): UserEntity
    {
        return new self($name, $email, $password);
    }
    public static function format_update(UserName $name, UserEmail $email): UserEntity
    {
        return new self($name, $email);
    }
}
