@extends('layouts.main')

@section('content')
<div class="container">
    <div class="m-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
        <div class="flex justify-between px-4 py-4 my-4">
            <div>
                <a href="{{ route('user.index') }}" class="inline-flex items-center hover:text-red-800 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center me-2 mb-2">
                    <svg class="max-w-4 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </a>
            </div>
            <div class="content-center text-2xl font-bold">
                DETAIL USER
            </div>
            <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500  focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg text-sm p-1.5" type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow max-w-4">
                <ul class="py-2" aria-labelledby="dropdownButton">
                    <li>
                        <a href="/user/edit/{{ $user->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Edit</a>
                    </li>
                    <li>
                        <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="post" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
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
            <img class="object-cover w-24 h-24 mb-3 rounded-full shadow-lg" src={{ asset('storage/' . $user->profile_picture) }} alt="User profile picture" />
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$user->nama_user}}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$user->email}}</span>
            <div>
                <label class="">Tanggal lahir :</label>
                <a class="inline-flex items-center py-2 text-sm font-medium text-center">{{$user->tanggal_lahir}}</a>
            </div>
            <div>
                <label class="">Status Akun :</label>
                <a class="inline-flex items-center py-2 text-sm font-medium text-center">{{$user->status}}</a>
            </div>
            <div>
                <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Bukti Pembayaran
                </button>
            </div>
            @if ($user->status === 'Pending')
            <div class="flex mt-10">
                <!-- Validate Button Form -->
                <form action="{{ route('user.validate', $user->id) }}" method="POST" class="inline-flex items-center">
                    @csrf
                    @method('POST')
                    <button type="submit" class="inline-flex items-center m-2 px-4 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300">
                        Validate
                    </button>
                </form>

                <!-- Reject Button Form -->
                <form action="{{ route('user.reject', $user->id) }}" method="POST" class="inline-flex items-center">
                    @csrf
                    @method('POST')
                    <button type="submit" class="inline-flex items-center m-2 px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                        Tolak
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->

<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-semibold text-gray-900 ">
                    Bukti Pembayaran
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <img class="object-cover" src={{ asset('storage/' . $user->bukti_pembayaran) }} alt="bukti pembayaran" />
            </div>
        </div>
    </div>
</div>
@endsection