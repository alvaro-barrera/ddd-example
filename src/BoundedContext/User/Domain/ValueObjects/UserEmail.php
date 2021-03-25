<?php


namespace Src\BoundedContext\User\Domain\ValueObjects;


final class UserEmail
{
    private $value;

    public function __construct(string $email)
    {
        $this->value = $email;
    }

    public function value(): string
    {
        return $this->value;
    }

}
