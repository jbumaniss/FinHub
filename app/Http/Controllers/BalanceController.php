<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\UserStock;
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

    public function storeCard(Request $request)
    {
        $formFields = $request->validate([
            'cardNumber' => ['required', 'min:12', 'max:12', Rule::unique('cards', 'cardNumber')],
            'expireDate' => 'required',
            'cardCvc' => 'required'
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
        $cardBalance = $card::find($user->id);
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
        $cardBalance = $card::find($user->id);
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
