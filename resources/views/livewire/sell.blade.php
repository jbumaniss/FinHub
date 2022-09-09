<div class="inline">
    <form method="POST" action="{{route('sellStock', [$inputVolume,$stockName, $stockPrice, $stockOldPrice])}}">
        @csrf
        <button
            class="mr-2 bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded "
            type="submit"
            onclick="return confirm(
            'Total Amount: {{number_format(((float)$inputVolume * $stockPrice),2,'.',',')}} ' + '\n' +
            'Are you sure?')">
            Sell
        </button>
        <input
            wire:model="inputVolume"
            class=" py-1 px-3 rounded-full text-xs mr-2"
            type="number"
            id="sell"
            name="sell"
            required
        >

        <p>Total Amount: {{number_format(((float)$inputVolume * $stockPrice),2,'.',',')}}</p>

    </form>
</div>


