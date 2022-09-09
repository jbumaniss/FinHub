<x-layout>

    @include('partials._hero')
    @include('partials._search')


    <div class="bg-gray-100">

    <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Dashboard</h1>
            </div>
        </div>

    </div>

    <div class=" m-2 h-2 bg-gray-100">
        <a href="/investment/show" class="bg-gray-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded">Manage Stocks</a>
    </div>

        <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div
                    class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Balance</h2>
                            <p class="font-bold text-3xl">{{$user->balance}}<span class="text-green-500"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div
                    class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-blue-600"><i class="fa fa-donate fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Funds Deposited</h2>
                            <p class="font-bold text-3xl">{{$user->fundsAdded}}<span class="text-blue-500"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div
                    class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-blue-600"><i class="fa fa-piggy-bank fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">Funds Withdrawn</h2>
                            <p class="font-bold text-3xl">{{$user->fundsWithdrawn}}<span class="text-blue-500"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div
                    class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                    <a href="/dashboard/payments">
                        <div class="flex flex-row items-center">

                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-indigo-600"><i
                                        class="fas fa-credit-card fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Manage Funds</h2>
                                <p class="font-bold text-3xl"></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

</x-layout>
