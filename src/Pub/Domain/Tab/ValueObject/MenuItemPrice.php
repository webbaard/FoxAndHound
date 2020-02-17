<?php

declare(strict_types=1);


namespace Webbaard\Pub\Domain\Tab\ValueObject;


use Money\Money;

final class MenuItemPrice
{
    private Money $price;

    private function __construct(Money $price)
    {
        $this->price = $price;
    }

    public static function fromString(string $price): self
    {
        return new self(Money::GBP($price));
    }

    public function toString(): string
    {
        return $this->price->getAmount();
    }

    public function asMoney(): Money
    {
        return $this->price;
    }
}