<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\UserStock;
use App\Services\FinHubService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvestmentController extends Controller
{

    public function show(FinHubService $data, UserStock $userStock, User $user): View
    {



        return view('investment.showStocks', [
            "stocks" => $data->requestStocks()->getStocks(),
            'userStocks' => $userStock::where('user_id', '=', auth()->id())->get(),
            'balance' => $user::find(auth()->id())->balance
        ]);
    }


    public function searchStocks(FinHubService $data, Request $request, User $user, UserStock $userStock): View
    {
        $validated = $request->validate([
            "search" => 'required | alpha | max:10'
        ]);

        if (!$validated) {
            redirect('/')->with('message', 'Only Letters Allowed, Max Length 10');
        }
        $search = strtoupper($_REQUEST['search']);

        return view('investment.searchStocks', [
            "stocks" => $data->requestStocks()->getStocks(),
            "search" => $search,
            'balance' => $user::find(auth()->id())->balance,
            'userStocks' => $userStock::where('user_id', '=', auth()->id())->get(),
        ]);
    }

    public function buyStock($inputVolume, $stockName, $stockPrice, $stockOldPrice, UserStock $userStock, User $user)
    {
        $findStock = $userStock::where('user_id', '=', auth()->id())->where('name', '=', $stockName);
        $balanceAfterPurchase = $user::find(auth()->id())->balance - ($inputVolume * $stockPrice);


        if ($balanceAfterPurchase < 1) {
            return back()->with('message', 'Insufficient Amount Of Funds');
        }

        if ($inputVolume < 1) {
            return back()->with('message', 'Please Input Valid Stock Amount');
        }

        if ($findStock->get()->count() > 0) {
            $totalStock = $findStock->first()->quantity + $inputVolume;
            $userStock::where('user_id', '=', auth()->id())->where('name', '=', $stockName)->update(
                ["quantity" => $totalStock]
            );

            $user::find(auth()->id())->update([
                "balance" => $balanceAfterPurchase
            ]);

            return back()->with('message', 'Stock obtained successfully');
        }


        $formFields = [
            'name' => $stockName,
            'user_id' => auth()->id(),
            'price' => $stockPrice,
            'oldPrice' => $stockOldPrice,
            'quantity' => $inputVolume
        ];

        UserStock::create($formFields);

        return back()->with('message', 'Stock obtained successfully');
    }

    public function sellStock($inputVolume, $stockName, $stockPrice, $stockOldPrice, UserStock $userStock, User $user)
    {
        $findStock = $userStock::where('user_id', '=', auth()->id())->where('name', '=', $stockName);


        if ($findStock->first() != null && $findStock->first()->quantity < 1) {
            return back()->with('message', 'Insufficient Amount Of Funds');
        }

        if ($inputVolume < 1 || $findStock->first() == null) {
            return back()->with('message', 'Please Input Valid Stock Amount');
        }

        if ($findStock->first()->quantity - $inputVolume >= 0 && $findStock->first() != null) {
            $totalStock = $findStock->first()->quantity - $inputVolume;
            $userStock::where('user_id', '=', auth()->id())->where('name', '=', $stockName)->update(
                ["quantity" => $totalStock]
            );
            $balanceAfterSell = $user::find(auth()->id())->balance + ($inputVolume * $stockPrice);
            $user::find(auth()->id())->update([
                "balance" => $balanceAfterSell
            ]);
            return back()->with('message', 'Stock sold successfully');
        }

        return back()->with('message', 'Insufficient Amount Of Stock');
    }
}
