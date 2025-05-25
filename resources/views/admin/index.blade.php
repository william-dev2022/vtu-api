@extends('layouts.admin')

@section('content')
<div class="w-full max-w-6xl py-10 mx-auto text-black">



    {{-- Blocks --}}

    <!-- Card Section -->
    <!-- Grid -->
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
        <!-- Card -->
        <div class="flex flex-col bg-white shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs tracking-wide text-gray-500 uppercase ">
                        Total Users
                    </p>
                    <div class="hs-tooltip">
                        <div class="hs-tooltip-toggle">
                            <svg class="text-gray-500 shrink-0 size-4 " xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                <path d="M12 17h.01" />
                            </svg>
                            <span
                                class="absolute z-10 invisible inline-block px-2 py-1 text-xs font-medium text-white transition-opacity bg-gray-900 rounded shadow-sm opacity-0 hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible dark:bg-neutral-700"
                                role="tooltip">
                                The number of users
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center mt-1 gap-x-2">
                    <h3 class="text-xl font-medium text-gray-800 sm:text-2xl ">
                        {{$totalUsers}}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs tracking-wide text-gray-500 uppercase ">
                        Total Deposits
                    </p>
                </div>

                <div class="flex items-center mt-1 gap-x-2">
                    <h3 class="text-xl font-medium text-gray-800 sm:text-2xl ">
                        @formatCurrency($totalDeposits)
                    </h3>


                </div>
                <div class='text-xs'>
                    <p><span class='font-bold'>Pending :</span> {{$totalPendingDeposits}}</p>
                    <p><span class='font-bold'>Completed :</span> {{$totalCompletedDeposits}}</p>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs tracking-wide text-gray-500 uppercase ">
                        Total Transactions
                    </p>
                </div>

                <div class="flex items-center mt-1 gap-x-2">
                    <h3 class="text-xl font-medium text-gray-800 sm:text-2xl ">
                        @formatCurrency($totalTransactionsAmount)
                        <div class='text-xs'>
                            <p><span class='font-bold'>Data :</span> @formatCurrency($totalDataPurchase)</p>
                            <p><span class='font-bold'>Airtime :</span> @formatCurrency($totalAirtime)</p>
                        </div>
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs tracking-wide text-gray-500 uppercase ">
                        Total Payment
                    </p>
                </div>

                <div class="flex items-center mt-1 gap-x-2">
                    <h3 class="text-xl font-medium text-gray-800 sm:text-2xl ">
                        {{-- @formatCurrency($totalPayment) --}}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->




    <div class="flex flex-col mt-20 bg-white rounded">
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
                                {{-- <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end ">
                                    Action</th> --}}
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
                                    Plan : {{ $transaction->meta['plan_name'] }}<br />>
                                    @endisset
                                    @isset($transaction->meta['channel'])
                                    Channel : {{ $transaction->meta['channel'] }}<br />
                                    @endisset
                                    @isset($transaction->meta['account_name'])
                                    Bank Name : {{ $transaction->meta['account_name'] }}<br />
                                    @endisset
                                    @isset($transaction->meta['reference'])
                                    Reference : {{ $transaction->meta['reference'] }}<br />
                                    @endisset
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    @isset($transaction->meta['response'])
                                    {{ $transaction->meta['response'] }} <br />
                                    @endisset
                                </td>
                                {{-- <td class="items-center py-4 text-xs font-medium ">
                                    <div class="flex items-center justify-end pr-2 space-x-1">
                                        <a href="/" type="button"
                                            class="flex items-center justify-center px-1 py-1 text-blue-500">
                                            <i class="text-base fa fa-eye"></i>
                                        </a>

                                        <a href="/" type="button"
                                            class="flex items-center justify-center px-1 py-1 text-blue-600">
                                            <i class="text-base fa fa-users"></i>
                                        </a>

                                    </div> --}}
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