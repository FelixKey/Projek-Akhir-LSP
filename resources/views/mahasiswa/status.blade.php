@extends('layouts.main')

@section('content')
@if(session('info'))
<div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
  {{ session('info') }}
</div>
@endif

@if(session('error'))
<div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
  {{ session('error') }}
</div>
@endif
<div class="container">
    <div class="m-4 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
        <div class="flex justify-between my-10 ml-4">
            <a href="{{ route('home')}}" class="max-w-10 inline-flex items-center hover:text-red-800 font-medium rounded-lg text-sm text-center ">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
            </a>
            <h2 class="text-2xl font-semibold">Status Mahasiswa</h2>
            <div class="w-5">
            </div>

        </div>
        <div class="flex flex-col items-center">
            <img class="object-cover w-24 h-24 mb-3 rounded-full shadow-lg" src={{ asset('storage/' . $mahasiswa->user->profile_picture) }} alt="User profile picture" />
            <h5 class="mb-1 text-xl font-medium text-gray-900">{{$mahasiswa->nama}}</h5>
        </div>
        <div class="flex items-center justify-center pb-10">
            <div class="text-center">
                <div class="my-2">
                    <label class="block  text-sm font-semibold text-gray-700">User ID</label>
                    <p class="inline-flex items-center py-2 text-sm font-medium text-gray-900">{{ $mahasiswa->id_user }}</p>
                </div>
                <label class="block text-sm font-semibold text-gray-700">Status Mahasiswa Anda</label>
                <p class="inline-flex py-2 text-sm font-medium text-gray-900">{{ $mahasiswa->status }}</p>
            </div>
        </div>
    </div>
</div>
@endsection