@extends('layouts.main')


@section('content')
<div class="container mx-auto p-6">
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

    <div class=" block p-6 max-w-xl min-w-xl bg-white border border-gray-200 rounded-lg shadow">
        <div class="flex justify-between mb-10">
            <a href="{{ route('user.detail',$user->id) }}" class="max-w-10 inline-flex items-center hover:text-red-800 font-medium rounded-lg text-sm text-center ">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
            </a>
            <h2 class="text-2xl font-semibold ml-4">Edit User Profile</h2>
            <div class="w-5">
            </div>
        </div>
        <div class="text-start">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="nama_user" class="block text-sm font-medium text-gray-700">Nama User</label>
                    <input type="text" id="nama_user" name="nama_user" value="{{ old('nama_user', $user->nama_user) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" required>
                    @error('nama_user')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" required>
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Leave blank if you do not want to change" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" required>
                    @error('tanggal_lahir')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <input type="file" id="profile_picture" name="profile_picture" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md">
                    @error('profile_picture')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @if ($user->profile_picture)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 object-cover rounded-md">
                    </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700">Bukti Pembayaran</label>
                    <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md">
                    @error('bukti_pembayaran')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @if ($user->bukti_pembayaran)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $user->bukti_pembayaran) }}" class="w-32 h-32 object-cover rounded-md" target="_blank">
                    </div>
                    @endif
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded-md shadow-sm hover:bg-red-800">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection