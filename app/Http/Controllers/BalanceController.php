<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BalanceController extends Controller
{
    public function payments(): View
    {
        return view('balance.payments', [
            'balance' => Auth::user()->balance
        ]);
    }

    public function addCard(): View
    {
        return view('balance.addCard');
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'cardNumber' => 'required|numeric|digits_between:12,12',
            'expireDate' => 'required|between:5,5',
            'cardCvc' => 'required|numeric|digits_between:3,3',
        ]);


        $formFields["cardBalance"] = 10000;

        $formFields['user_id'] = auth()->id();

        Card::create($formFields);

        return redirect('/dashboard/payments')->with('message', 'Card Added successfully');
    }

    public function removeCard(): View
    {
        return view('balance.removeCard', ['cards' => auth()->user()->card()->get()]);
    }


    public function destroyCard(Card $card): RedirectResponse
    {
        $card->delete();
        return redirect('/dashboard/payments')->with('message', 'Card deleted successfully');
    }

    public function funds(): View
    {
        return view('balance.funds', [
            'cards' => auth()->user()->card()->get(),
            'balance' => Auth::user()->balance
        ]);
    }

    public function addFunds(Request $request, Card $card)
    {
        $formFields = $request->validate([
            'addFunds' => 'required | numeric',
        ]);

        $balance = implode('', $formFields);
        $user = Auth::user();
        $cardBalance = $card::where('user_id', '=', $user->id)->first();
        //var_dump($card::where('user_id', '=', $user->id)->first()->cardBalance);die();
        if (($cardBalance->cardBalance - $balance) <= 0) {
            return redirect('/dashboard/payments/funds')->with('message', 'Insufficient funds');
        }
        $cardBalance->cardBalance = (float)$cardBalance->cardBalance - (float)$balance;
        $user->balance = $user->balance + (float)$balance;

        $user->fundsAdded += (float)$balance;
        $cardBalance->save();
        $user->save();

        return redirect('/dashboard/payments/funds')->with('message', 'Balance updated successfully');
    }

    public function withdrawFunds(Request $request, Card $card)
    {
        $formFields = $request->validate([
            'withdrawFunds' => 'required | numeric',
        ]);

        $withdrawFunds = implode('', $formFields);

        $user = Auth::user();
        $cardBalance = $card::where('user_id', '=', $user->id)->first();
        if (($user->balance - $withdrawFunds) <= 0) {
            return redirect('/dashboard/payments/funds')->with('message', 'Insufficient funds');
        }
        $cardBalance->cardBalance = (float)$cardBalance->cardBalance + (float)$withdrawFunds;
        $user->balance = $user->balance - (float)$withdrawFunds;
        $user->fundsWithdrawn += (float)$withdrawFunds;
        $cardBalance->save();
        $user->save();

        return redirect('/dashboard/payments/funds')->with('message', 'Balance updated successfully');
    }


}
