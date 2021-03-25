<?php


namespace Src\BoundedContext\User\Domain\ValueObjects;


final class UserId
{
    private $value;

    public function __construct(int $id)
    {
        $this->value = $id;
    }

    public function value()
    {
        return $this->value;
    }
}
