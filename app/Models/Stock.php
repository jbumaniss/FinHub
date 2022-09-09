<?php


namespace App\Models;

class Stock
{
    private string $name;
    private float $price;
    private float $oldPrice;

    public function __construct(string $name, float $price, float $oldPrice )
    {
        $this->name = $name;
        $this->price = $price;
        $this->oldPrice = $oldPrice;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getPrice(): float
    {
        return $this->price;
    }


    public function getOldPrice(): float
    {
        return $this->oldPrice;
    }
}
