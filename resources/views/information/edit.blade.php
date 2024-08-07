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
<div class="container mx-auto px-4 py-6">
    <div class="w-full max-w-lg mx-auto bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <form action="{{ route('information.update', $information->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Informasi</h2>

            <!-- Title -->
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $information->judul) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>
                @error('judul')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50" required>{{ old('deskripsi', $information->deskripsi) }}</textarea>
                @error('deskripsi')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Thumbnail -->
            <div class="mb-4">
                <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                @if($information->thumbnail)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $information->thumbnail) }}" alt="Current Thumbnail" class="w-32 h-32 object-cover rounded-md">
                </div>
                @endif
                <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50">
                @error('thumbnail')
                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-red-600 shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection