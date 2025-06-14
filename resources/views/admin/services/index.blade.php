@extends('layouts.admin')

@section('content')
<div class="w-full max-w-4xl mx-auto text-black">
    <div class="flex flex-col mt-5 bg-white rounded">
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
                                    Status</th>
                                {{-- <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Icon</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Link</th> --}}
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end ">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @isset($services)
                            @foreach ($services as $service)
                            <tr>
                                <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap ">
                                    {{$service->name}}</td>

                                <td id="{{$service->id .'status'}}"
                                    class="px-6 py-4 text-xs text-gray-800 capitalize whitespace-nowrap">
                                    {{$service->status}}
                                </td>
                                {{-- <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap ">
                                    {{$service->icon}}</td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    {{ $service->link }}
                                </td> --}}
                                <td class="items-center py-4 text-xs font-medium ">
                                    <div class="flex items-center justify-end pr-2 space-x-3">

                                        <div class="flex items-center gap-x-3">
                                            <label for="{{$service->id .'checkbox'}}"
                                                class="relative inline-block h-4 cursor-pointer w-7">
                                                <input type="checkbox" id="{{$service->id .'checkbox'}}"
                                                    data-id="{{$service->id}}" class="sr-only peer"
                                                    {{strtolower($service->status) === 'active'?
                                                'checked' : ''}}
                                                >
                                                <span
                                                    class="absolute inset-0 transition-colors duration-200 ease-in-out bg-gray-200 rounded-full peer-checked:bg-blue-600 dark:bg-neutral-700 dark:peer-checked:bg-blue-500 peer-disabled:opacity-50 peer-disabled:pointer-events-none"></span>
                                                <span
                                                    class="absolute top-1/2 start-0.5 -translate-y-1/2 size-4 bg-white rounded-full shadow-xs transition-transform duration-200 ease-in-out h-4 peer-checked:translate-x-full dark:bg-neutral-400 dark:peer-checked:bg-white"></span>
                                            </label>
                                        </div>

                                        <form action='{{route('services.destroy', $service->id )}}' method='POST'>
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center justify-center p-2 text-white rounded bg-red-950">
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
        let status = this.checked ? 'active' : 'inactive'; // Adjust based on your statuses

        console.log(transactionId)
        fetch('/update-service-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id: transactionId, status: status })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Service updated:', data);
            document.getElementById(transactionId +'status').innerText = status;
        })
        .catch(error => {
            console.error('Error service transaction:', error);
        });
    });
});

</script>
@endPushOnce