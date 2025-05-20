@extends('layouts.admin')

@section('content')
<div class="max-w-6xl w-full mx-auto py-10 text-black">


    <div x-data="{ activeTab: 'data' }" class="w-full rounded-lg ">

        <!-- Tabs -->
        <div class="flex flex-wrap  bg-white rounded-lg shadow-sm border-b border-gray-200">
            <button @click="activeTab = 'data'"
                :class="activeTab === 'data' ? 'border-b-2 border-blue-500 text-blue-600' : 'text-gray-600'"
                class="px-4 py-2 font-semibold  focus:outline-none">
                Data Plan
            </button>

            @isset($plans['cable'])
            @if (count($plans['cable']) > 0)
            <button @click="activeTab = 'cable'"
                :class="activeTab === 'cable' ? 'border-b-2 border-blue-500 text-blue-600' : 'text-gray-600'"
                class="px-4 py-2 font-semibold  focus:outline-none">
                Cable Plan
            </button>
            @endif
            @endisset



            @isset($plans['exam'])
            @if (count($plans['exam']) > 0)
            <button @click="activeTab = 'exam'"
                :class="activeTab === 'exam' ? 'border-b-2 border-blue-500 text-blue-600' : 'text-gray-600'"
                class="px-4 py-2 font-semibold  focus:outline-none">
                Exam Plan
            </button>
            @endif
            @endisset

        </div>

        @isset($plans['data'])
        <div x-show="activeTab === 'data'" class="flex flex-col bg-white mt-5 rounded">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden rounded-lg ">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Type</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Network</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Plan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Price</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Category</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Description</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end ">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @isset($plans['data'])
                                @foreach ($plans['data'] as $dataPlan)
                                <tr>
                                    <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap ">
                                        {{$dataPlan->title}}</td>
                                    <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap uppercase ">
                                        {{$dataPlan->network}}</td>
                                    <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap uppercase ">
                                        {{$dataPlan->display_name}}</td>
                                    <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                        @formatCurrency($dataPlan->price)
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap uppercase ">
                                        {{-- @formatDate($dataPlan->created_at) --}}
                                        {{$dataPlan->category}}
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                        {{$dataPlan->status}}
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-800 ">
                                        Validity : {{ $dataPlan->validity}} <br />
                                        Reseller Price : @formatCurrency($dataPlan->reseller_price) <br />
                                        Possible Gain : @formatCurrency($dataPlan->price - $dataPlan->reseller_price)
                                        <br />


                                    </td>

                                    <td class="items-center py-4 text-xs font-medium ">
                                        <div class="flex items-center justify-end pr-2 space-x-1">
                                            <a href="/" type="button"
                                                class="flex items-center justify-center px-1 py-1 text-blue-500">
                                                <i class="text-base fa fa-edit"></i>
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
        @endisset

        @isset($plans['cable'])
        <div x-show="activeTab === 'cable'" class="flex flex-col bg-white mt-5 rounded">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden rounded-lg ">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Provider</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Plan</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Price</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Category</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                        Status</th> 
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end ">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @isset($plans['cable'])
                                @foreach ($plans['cable'] as $cablePlan)
                                <tr>
                                    <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap uppercase ">
                                        {{$cablePlan->provider}}</td>
                                    <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap uppercase ">
                                        {{$cablePlan->plan_id}}</td>
                                    <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap uppercase ">
                                        {{$cablePlan->name}}</td>
                                    <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                        @formatCurrency($cablePlan->price)
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap uppercase ">
                                        {{-- @formatDate($dataPlan->created_at) --}}
                                        {{$dataPlan->category}}
                                    </td>
                                    <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                        {{$dataPlan->status}}
                                    </td> 
                                    <td class="items-center py-4 text-xs font-medium ">
                                        <div class="flex items-center justify-end pr-2 space-x-1">
                                            <a href="/" type="button"
                                                class="flex items-center justify-center px-1 py-1 text-blue-500">
                                                <i class="text-base fa fa-edit"></i>
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
        @endisset


    </div>

</div>
@endsection