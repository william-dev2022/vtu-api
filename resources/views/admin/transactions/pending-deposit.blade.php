@extends('layouts.admin')

@section('content')
<div class="w-full max-w-6xl py-5 mx-auto text-black">


    <div class="flex flex-col bg-white rounded">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden rounded-lg ">
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Type</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Price</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Status</th>

                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end ">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @isset($transactions)
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap ">
                                    {{$transaction->user->name}}</td>
                                <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap ">
                                    {{$transaction->type}}</td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    @formatCurrency($transaction->amount)
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    @formatDate($transaction->created_at)
                                </td>
                                <td id="{{$transaction->id .'status'}}"
                                    class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    {{$transaction->status}}
                                </td>

                                <td class="items-center py-4 text-xs font-medium ">
                                    <div class="flex items-center justify-end pr-2 space-x-1">

                                        <div class="flex items-center gap-x-3">
                                            <label for="{{$transaction->id .'checkbox'}}"
                                                class="relative inline-block h-4 cursor-pointer w-7">
                                                <input type="checkbox" id="{{$transaction->id .'checkbox'}}"
                                                    data-id="{{$transaction->id}}" class="sr-only peer"
                                                    {{$transaction->status === 'completed'?
                                                'checked' : ''}}
                                                >
                                                <span
                                                    class="absolute inset-0 transition-colors duration-200 ease-in-out bg-gray-200 rounded-full peer-checked:bg-blue-600 dark:bg-neutral-700 dark:peer-checked:bg-blue-500 peer-disabled:opacity-50 peer-disabled:pointer-events-none"></span>
                                                <span
                                                    class="absolute top-1/2 start-0.5 -translate-y-1/2 size-4 bg-white rounded-full shadow-xs transition-transform duration-200 ease-in-out h-4 peer-checked:translate-x-full dark:bg-neutral-400 dark:peer-checked:bg-white"></span>
                                            </label>
                                        </div>

                                        {{-- <a href="{{route('transactions.show', $transaction->id) }}" type="button"
                                            class="flex items-center justify-center px-1 py-1 text-blue-500">
                                            <i class="text-base fa fa-edit"></i>
                                        </a> --}}

                                        <form action='/transaction/deposit/{{ $transaction->id }}' method='POST'>
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit"
                                                class="flex items-center justify-center px-1 py-1 text-blue-500">
                                                <i class="text-base fa fa-trash"></i>

                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                            @endforeach
                            @endisset


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@pushOnce('script')
<script>
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        let transactionId = this.getAttribute('data-id');
        let status = this.checked ? 'completed' : 'pending'; // Adjust based on your statuses

        console.log(transactionId)
        fetch('/update-transaction-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id: transactionId, status: status })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Transaction updated:', data);
            document.getElementById(transactionId +'status').innerText = status;
        })
        .catch(error => {
            console.error('Error updating transaction:', error);
        });
    });
});

</script>
@endPushOnce