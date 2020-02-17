<?php

declare(strict_types=1);


namespace Webbaard\Pub\Domain\Tab\ValueObject;


final class MenuItemName
{
    private string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function fromString(string $name)
    {
        return new self($name);
    }

    public function toString(): string
    {
        return $this->name;
    }
}