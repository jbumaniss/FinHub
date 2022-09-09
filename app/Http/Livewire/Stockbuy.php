<?php

namespace App\Http\Livewire;


use Illuminate\View\View;
use Livewire\Component;

class Stockbuy extends Component
{
    public string $inputVolume = '1';
    public float $stockPrice;
    public string $stockName;
    public float $stockOldPrice;


    public function render(): View
    {
        return view('livewire.buy');
    }
}
