@extends('layouts.admin')

@section('content')
<div class="max-w-6xl w-full mx-auto py-10 text-black">


    <div class="flex flex-col bg-white mt-20 rounded">
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
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Description</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Response</th>
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
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    {{$transaction->status}}
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 ">
                                    @isset($transaction->meta['network'])
                                    Network : {{ $transaction->meta['network'] }} <br />
                                    @endisset
                                    @isset($transaction->meta['phone_number'])
                                    Phone : {{ $transaction->meta['phone_number'] }}<br />
                                    @endisset
                                    @isset($transaction->meta['plan_name'])
                                    Plan : {{ $transaction->meta['plan_name'] }}
                                    @endisset
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    @isset($transaction->meta['response'])
                                    {{ $transaction->meta['response'] }} <br />
                                    @endisset
                                </td>
                                <td class="items-center py-4 text-xs font-medium ">
                                    <div class="flex items-center justify-end pr-2 space-x-1">
                                        <a href="/" type="button"
                                            class="flex items-center justify-center px-1 py-1 text-blue-500">
                                            <i class="text-base fa fa-eye"></i>
                                        </a>

                                        <a href="/" type="button"
                                            class="flex items-center justify-center px-1 py-1 text-blue-600">
                                            <i class="text-base fa fa-users"></i>
                                        </a>

                                        <a href="/" type="button"
                                            class="flex items-center justify-center px-1 py-1 text-blue-500">
                                            <i class="text-base fa fa-futbol-o"></i>

                                        </a>
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