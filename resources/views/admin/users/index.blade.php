@extends('layouts.admin')

@section('content')
<div class="w-full max-w-6xl py-10 mx-auto text-black">

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
                                    Phone</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Verified</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-start ">
                                    Description</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-end ">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @isset($users)
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap ">
                                    {{$user->name}}</td>
                                <td class="px-6 py-4 text-xs font-medium text-gray-800 whitespace-wrap ">
                                    {{$user->phone_number}}</td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    {{$user->is_verified ? 'True' : 'False'}}</td>
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    @formatDate($user->created_at)
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 whitespace-nowrap ">
                                    {{$user->status}}
                                </td>
                                <td class="px-6 py-4 text-xs text-gray-800 ">
                                    Deposits : @formatCurrency($user->deposits()->sum('amount')) <br />
                                    Balance : @formatCurrency($user->balance())<br />
                                </td>
                                <td class="items-center py-4 text-xs font-medium ">
                                    <div class="flex items-center justify-end pr-2 space-x-1">
                                        <a href="/" type="button"
                                            class="flex items-center justify-center px-1 py-1 text-blue-500">
                                            <i class="text-base fa fa-eye"></i>
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