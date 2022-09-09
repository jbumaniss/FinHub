<x-layout>

    @include('partials._hero')
    @include('partials._search')

<div class="bg-gray-100">
    <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Remove Card</h1>
            </div>
        </div>
    </div>

    <div class=" m-2 h-2 ">
        <a href="/dashboard/payments" class="bg-gray-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded">Back</a>
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
                            <th class="py-3 px-6 text-center"></th>
                            <th class="py-3 px-6 text-center"></th>
                            <th class="py-3 px-6 text-center">Actions</th>
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

                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class=" py-1 px-3 rounded-full text-xs"></span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">

                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                                <form method="POST"
                                                      action="/dashboard/payments/remove-card/{{$card->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="mr-2 bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                        type="submit"
                                                        onclick="return confirm('Are you sure you want delete your card?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
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

</div>
</x-layout>
