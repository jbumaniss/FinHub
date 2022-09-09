<x-layout>

    @include('partials._hero')
    @include('partials._search')

<div class="bg-gray-100">

    <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Payments</h1>
            </div>
        </div>
    </div>


    <div class=" m-2 h-2 bg-gray-100">
        <a href="/dashboard" class="bg-gray-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded">Back</a>
    </div>

        <div class="flex flex-wrap bg-gray-100">
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
                            <p class="font-bold text-3xl">{{$balance}}<span class="text-green-500"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div
                    class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                    <a href="/dashboard/payments/add-card">
                        <div class="flex flex-row items-center">

                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-indigo-600"><i
                                        class="fas fa-credit-card fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Add Card</h2>

                            </div>

                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div
                    class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                    <a href="/dashboard/payments/remove-card">
                        <div class="flex flex-row items-center">

                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-red-600"><i
                                        class="fas fa-credit-card fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Remove card</h2>
                                <p class="font-bold text-3xl"></p>
                            </div>

                        </div>
                    </a>
                </div>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <div
                    class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                    <a href="/dashboard/payments/funds">
                        <div class="flex flex-row items-center">

                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-indigo-600"><i
                                        class="fa fa-money-bill-wave fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h2 class="font-bold uppercase text-gray-600">Add/Withdraw Funds</h2>

                            </div>

                        </div>
                    </a>
                </div>
            </div>
        </div>

</div>

</x-layout>
