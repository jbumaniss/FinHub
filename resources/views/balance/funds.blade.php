<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Funds</h1>
            </div>
        </div>
    </div>

    <a href="/dashboard/payments" class="m-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Back
    </a>

    <div class="w-full p-6">
        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5 ">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h2 class="font-bold uppercase text-gray-600">Balance</h2>
                    <p class="font-bold text-3xl">{{$balance}}<span class="text-green-500"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto">
        <div
            class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Card Number</th>
                            <th class="py-3 px-6 text-left">Card Expire Date</th>
                            <th class="py-3 px-6 text-center">Add</th>
                            <th class="py-3 px-6 text-center"></th>
                            <th class="py-3 px-6 text-center">Withdraw</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        @if(count($cards) > 0)
                            @foreach($cards as $card)
                                <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <i class="fas fa-credit-card"></i>
                                            </div>
                                            <span class="font-medium">{{$card->cardNumber}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>{{$card->expireDate}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            @livewire('addfunds')
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class=" py-1 px-3 rounded-full text-xs"></span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            @livewire('withdrawfunds')
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <h1 class="">No Cards Found</h1>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>
