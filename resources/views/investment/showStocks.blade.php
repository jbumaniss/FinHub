<x-layout>

    @include('partials._hero')
    @include('partials._search')

    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Stocks
            </h1>
        </header>

        <div class="w-full p-6">
            <div
                class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5 ">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Balance</h2>
                        <p class="font-bold text-3xl">{{number_format($balance,2,'.',',')}}<span
                                class="text-green-500"></span></p>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <div
                    class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Stock</th>
                                    <th class="py-3 px-6 text-left">Price</th>
                                    <th class="py-3 px-6 text-center">Owned</th>
                                    <th class="py-3 px-6 text-center">Buy</th>
                                    <th class="py-3 px-6 text-center">Sell</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">

                                @foreach($stocks as $stock)

                                    <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <div class="mr-2">
                                                    <img class="w-6 h-6"
                                                         src="{{ url('images/icon.png') }}" alt=""/>
                                                </div>
                                                <span class="font-medium">{{$stock->getName()}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <div class="mr-2">
                                                    @if($stock->getPrice() > $stock->getOldPrice())
                                                        <i class="fas fa-chevron-up text-green-400"></i>
                                                    @else
                                                        <i class="fas fa-chevron-down text-red-400"></i>
                                                    @endif
                                                </div>
                                                <span>{{number_format($stock->getPrice(), 2, '.', ',')}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex items-center justify-center">
                                                @foreach($userStocks as $userStock)
                                                    @if($userStock->name == $stock->getName() && $userStock->quantity > 0)
                                                        {{$userStock->quantity}}
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">

                                            @livewire('stockbuy', [
                                            'stockPrice'=> $stock->getPrice(),
                                            'stockName' => $stock->getName(),
                                            'stockOldPrice' => $stock->getOldPrice(),

                                            ])

                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            @livewire('stocksell', [
                                            'stockPrice'=> $stock->getPrice(),
                                            'stockName' => $stock->getName(),
                                            'stockOldPrice' => $stock->getOldPrice(),
                                            ])
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
