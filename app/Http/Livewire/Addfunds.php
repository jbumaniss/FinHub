<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Addfunds extends Component
{
    public string $addFunds = '1';


    public function render(): View
    {
        return view('livewire.addfunds');
    }
}
