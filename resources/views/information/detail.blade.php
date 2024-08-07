@extends('layouts.main')

@section('content')
<div class="container">
    <div class="m-4 text-center">
        <div><a class="font-bold">{{$information->judul}}</a></div>
    </div>
    <div class="m-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
        <div class="flex justify-between px-4 pt-4">
            <div>
                <a href="{{ route('information.index') }}" class="inline-flex items-center hover:text-red-800 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center me-2 mb-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </a>
            </div>
            <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500  focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5" type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2" aria-labelledby="dropdownButton">
                    <li>
                        <a href="/information/edit/{{ $information->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Edit</a>
                    </li>
                    <li>
                        <form action="{{ route('information.delete', ['id' => $information->id]) }}" method="post" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-center pb-10">
            <img class="object-cover w-24 h-24 mb-3 rounded-full shadow-lg" src={{ asset('storage/' . $information->thumbnail) }} alt="User profile picture" />
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$information->judul}}</h5>
            <div>
                <a class="inline-flex items-center py-2 text-sm font-medium text-center">{{$information->deskripsi}}</a>
            </div>
        </div>
    </div>
</div>
@endsection