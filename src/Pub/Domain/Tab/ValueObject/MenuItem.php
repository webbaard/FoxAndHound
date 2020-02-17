<?php

declare(strict_types=1);


namespace Webbaard\Pub\Domain\Tab\ValueObject;


use Money\Money;

final class MenuItem
{
    private MenuItemName $name;

    private MenuItemPrice $price;

    private function __construct(MenuItemName $name, MenuItemPrice $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public static function fromStrings(string $name, string $price): self
    {
        return new self(MenuItemName::fromString($name), MenuItemPrice::fromString($price));
    }

    public function name(): MenuItemName
    {
        return $this->name;
    }

    public function price(): MenuItemPrice
    {
        return $this->price;
    }
}