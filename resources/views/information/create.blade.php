@extends('layouts.main')

@section('content')
<a class="fa btn btn-secondary" style="margin-bottom:1%;" href="{{ route('information.index') }}">&#xf104;</a>

<h2>Tambah Informasi</h2>

@if (session()->has('info'))
<div class="alert alert-success" role="alert">
    {{ session()->get('info') }}
</div>
@endif

@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
    {{ $error }}
</div>
@endforeach



<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form action="{{ route('information.create.store') }}" method="POST">
        @csrf
        <h5 class="text-xl font-medium text-gray-900 ">Daftar Akun</h5>
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
        <div class="form-group mt-2">
            <input type="submit" class="form-control btn-primary mt-2" value="Simpan Data" style="width:fit-content;">
        </div>
    </form>
</div>


@endsection