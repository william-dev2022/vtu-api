@extends('layouts.admin')

@section('content')
<div class="">
    <form id="courseForm"  class="py-10" method="POST">
        @csrf

        <div class="max-w-2xl px-4 py-8 mx-auto space-y-4 text-xs bg-white rounded-md shadow text-slate-700">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="">
                    <label for="name" class="block text-gray-700 ">
                        Name <span class='text-red-500'>*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                            class="block w-full p-2 text-xs border rounded-md border-slate-100 ring-0 focus:border-slate-400 text-slate-600 focus:ring-0 sm:text-sm"
                            required>
                        @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="link" class="block text-gray-700 ">
                        Link
                    </label>
                    <div class="mt-1">
                        <input type="number" name="link" id="link"
                            class="block w-full p-2 border rounded-md border-slate-100 ring-0 focus:ring-0 focus:border-slate-300 sm:text-sm"
                            required>
                        @error('link')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="">
                    <label for="icon" class="block text-gray-700 ">
                        Icon <span class='text-red-500'>*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="icon" id="icon"
                            class="block w-full p-2 text-xs border rounded-md border-slate-100 ring-0 focus:border-slate-400 text-slate-600 focus:ring-0 sm:text-sm">
                        @error('icon')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="status" class="block text-gray-700 ">
                        Status
                    </label>
                    <div class="mt-1">
                        <select name="status" id="status"
                            class="block w-full p-2 border rounded-md border-slate-100 ring-0 focus:ring-0 focus:border-slate-300 sm:text-sm"
                            required>
                            <option>active</option>
                            <option>inactive</option>
                        </select>
                        @error('status')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>






            <div>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 mt-6 text-white bg-purple-800 rounded">
                    Create
                </button>
            </div>
        </div>
    </form>
</div>
@endsection