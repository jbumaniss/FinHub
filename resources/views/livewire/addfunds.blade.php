<div class="inline">
    <form method="POST" action="/dashboard/payments/addFunds">
        @csrf
        <button
            class="mr-2 bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            type="submit"
            onclick="return confirm('Are you sure?')">
            Add Amount
        </button>
        <input
            wire:model="addFunds"
            class=" py-1 px-3 rounded-full text-xs mr-2"
            type="number"
            id="addFunds"
            name="addFunds">
        <p>Amount: {{ number_format(((float) $addFunds),2,'.',',')}}</p>

    </form>
</div>
