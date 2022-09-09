<div class="inline">
    <form method="POST" action="{{route('buyStock', [$inputVolume,$stockName, $stockPrice, $stockOldPrice])}}">
        @csrf
        <button
            class="mr-2 bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            type="submit"
            onclick="return confirm(
            'Total Amount: {{number_format(((float)$inputVolume * $stockPrice),2,'.',',')}} ' + '\n' +
            'Are you sure?')"
        >
            Buy
        </button>
        <input
            wire:model="inputVolume"
            required
            class=" py-1 px-3 rounded-full text-xs mr-2"
            type="number"
            id="buy"
            name="buy">
        <p>Total Amount: {{ number_format(((float) $inputVolume * $stockPrice),2,'.',',')}}</p>

    </form>

</div>


