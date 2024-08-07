@extends('layouts.main')

@section('content')

@if(session('info'))
<div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
    {{ session('info') }}
</div>
@endif

@if($errors->any())
<div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
    <strong class="font-bold">Whoops!</strong>
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container my-10">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 ">
        <form enctype="multipart/form-data" action="{{ route('mahasiswa.create.store') }}" method="POST">
            @csrf
            <div class="flex justify-between mb-10">
                <a href="{{ route('mahasiswa.index') }}" class="max-w-10 inline-flex items-center hover:text-red-800 font-medium rounded-lg text-sm text-center ">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                        <path stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                    </svg>
                </a>
                <h2 class="text-2xl font-semibold ml-4">Daftar Mahasiswa</h2>
                <div class="w-5">
                </div>
            </div>
            <div>
                <label for="id_user" class="block mb-2 text-sm font-medium text-gray-900 ">Id User</label>
                <input readonly value="{{Auth::user()->id}}" type="text" name="id_user" id="id_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" />
            </div>
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Mahasiswa</label>
                <input readonly value="{{Auth::user()->nama_user}}" type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" />
            </div>
            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 ">No Telpon</label>
                <input type="text" name="no_telp" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="asal_sekolah" class="block mb-2 text-sm font-medium text-gray-900 ">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
            </div>
            <div>
                <label for="program_studi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program Studi</label>
                <select id="program_studi" name="program_studi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 " required>
                    <option value="" disabled selected>Choose</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Manajemen Informatika">Manajemen Informatika</option>
                    <option value="Manajemen">Manajemen</option>
                    <option value="Akuntansi">Akuntansi</option>
                </select>
            </div>
            <div>
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 " required>
                    <option value="" disabled selected>Choose</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                <select id="agama" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 " required>
                    <option value="" disabled selected>Choose</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Islam">Islam</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <button type="submit" class=" text-white mt-10 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
        </form>
    </div>
</div>



@endsection