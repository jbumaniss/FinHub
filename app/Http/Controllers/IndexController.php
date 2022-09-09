<?php

namespace App\Http\Controllers;

use App\Services\FinHubService;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(FinHubService $data): View
    {
        $sliceStocks = array_slice($data->requestStocks()->getStocks(),0,12);

        return view('index.index',
            ["stocks" => $sliceStocks]);
    }

    public function contacts(): View
    {
        return view('index.contacts');
    }
}
