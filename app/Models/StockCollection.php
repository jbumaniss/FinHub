<?php


namespace App\Models;

class StockCollection
{
    private array $stocksArray = [];

    public function __construct(array $stocksArray)
    {
        $this->stocksArray = $stocksArray;
    }

    public function addStocks(Stock $stock): void
    {
        $this->stocksArray[]=$stock;
    }

    public function getStocks(): array
    {
        return $this->stocksArray;
    }


}
