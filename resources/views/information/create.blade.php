@extends('layouts.main')

@section('content')

@if (session()->has('info'))
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

<div class="container my-10">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 ">
        <form enctype="multipart/form-data" action="{{ route('information.create.store') }}" method="POST">
            @csrf
            <div>
                <a href="{{ route('information.index') }}" class="inline-flex items-center hover:text-red-800 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center me-2 mb-2">
                    <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </a>
            </div>
            <div>
                <h5 class="text-xl text-center mb-4 font-bold text-gray-900 ">Tambah Informasi</h5>
            </div>
            <div>
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 ">Judul Informasi</label>
                <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Judul Informasi" required />
            </div>
            <div>
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 ">Deskripsi</label>
                <input type="text" name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" />
            </div>
            <button type="submit" class=" text-white mt-10 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>

        </form>
    </div>
</div>



@endsection