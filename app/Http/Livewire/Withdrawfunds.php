<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Withdrawfunds extends Component
{

    public string $withdrawFunds = '1';

    public function render(): View
    {
        return view('livewire.withdrawfunds');
    }
}
