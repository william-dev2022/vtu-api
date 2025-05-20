@extends('layouts.admin')

@section('content')
<div class="max-w-6xl w-full mx-auto py-10 text-black">



    {{-- Blocks --}}

    <!-- Card Section -->
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Card -->
        <div class="flex flex-col bg-white  shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500 ">
                        Total Users
                    </p>
                    <div class="hs-tooltip">
                        <div class="hs-tooltip-toggle">
                            <svg class="shrink-0 size-4 text-gray-500 " xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                <path d="M12 17h.01" />
                            </svg>
                            <span
                                class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                role="tooltip">
                                The number of users
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
                        {{-- {{$totalParticipants}} --}}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white  shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500 ">
                        Total Deposits
                    </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
                        {{-- {{$totalParticipants}} --}}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white  shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500 ">
                        Total Transactions
                    </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
                        {{-- {{$totalTournaments}} --}}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white  shadow-sm rounded-xl ">
            <div class="p-4 md:p-5">
                <div class="flex items-center gap-x-2">
                    <p class="text-xs uppercase tracking-wide text-gray-500 ">
                        Total Payment
                    </p>
                </div>

                <div class="mt-1 flex items-center gap-x-2">
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 ">
                        {{-- @formatCurrency($totalPayment) --}}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->




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
                                        Network : {{ $transaction->meta['network'] }} <br/>
                                    @endisset 
                                    @isset($transaction->meta['phone_number'])
                                        Phone : {{ $transaction->meta['phone_number'] }}<br/>
                                    @endisset 
                                    @isset($transaction->meta['plan_name'])
                                        Plan : {{ $transaction->meta['plan_name'] }}
                                    @endisset 
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    @isset($transaction->meta['response'])
                                       {{ $transaction->meta['response'] }} <br/>
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