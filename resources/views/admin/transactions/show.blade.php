@extends('layouts.admin')

@section('content')
<div class="w-full max-w-6xl py-10 mx-auto text-black">


    <div class="flex flex-col mt-5 bg-white rounded x-10">
        {{-- Transaction details --}}
        <ul>
            <li><span class='text-sm font-black'>Name :</span> {{ $transaction->user->name }}</li>
            <li><span class='text-sm font-black'>Amount :</span> @formatCurrency($transaction->amount)</li>
            <li><span class='text-sm font-black'>Name :</span> {{ $transaction->user->name }}</li>
            <li><span class='text-sm font-black'>Name :</span> {{ $transaction->user->name }}</li>
            <li><span class='text-sm font-black'>Name :</span> {{ $transaction->user->name }}</li>
        </ul>
    </div>
</div>
@endsection