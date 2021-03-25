<?php


namespace Src\BoundedContext\User\Domain;


use Src\BoundedContext\User\Domain\ValueObjects\UserName;

final class User
{
    private $name;

    public function __construct(UserName $name)
    {
        $this->name = $name;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public static function create(UserName $name): User
    {
        $user = new self($name);
        return $user;
    }
}
