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
            <a href="{{ route('mahasiswa.detail',$mahasiswa->id) }}" class="max-w-10 inline-flex items-center hover:text-red-800 font-medium rounded-lg text-sm text-center ">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 8 14">
                    <path stroke="#b91c1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 1 1.3 6.326a.91.91 0 0 0 0 1.348L7 13" />
                </svg>
            </a>
            <h2 class="text-2xl font-semibold ml-4">Edit Mahasiswa Profile</h2>
            <div class="w-5">
            </div>
        </div>
        <div class="text-start">
            <form method="POST" action="{{ route('mahasiswa.update',$mahasiswa->id) }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $mahasiswa->alamat) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                </div>

                <div class="mb-4">
                    <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900">No. Telepon</label>
                    <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $mahasiswa->no_telp) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                </div>

                <div class="mb-4">
                    <label for="asal_sekolah" class="block mb-2 text-sm font-medium text-gray-900">Asal Sekolah</label>
                    <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $mahasiswa->asal_sekolah) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                </div>

                <div class="mb-4">
                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                </div>

                <div class="mb-4">
                    <label for="program_studi" class="block mb-2 text-sm font-medium text-gray-900">Program Studi</label>
                    <select id="program_studi" name="program_studi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                        <option value="Informatika" {{ old('program_studi', $mahasiswa->program_studi) == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                        <option value="Sistem Informasi" {{ old('program_studi', $mahasiswa->program_studi) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                        <option value="Teknik Elektro" {{ old('program_studi', $mahasiswa->program_studi) == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                        <option value="Manajemen Informatika" {{ old('program_studi', $mahasiswa->program_studi) == 'Manajemen Informatika' ? 'selected' : '' }}>Manajemen Informatika</option>
                        <option value="Manajemen" {{ old('program_studi', $mahasiswa->program_studi) == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
                        <option value="Akuntansi" {{ old('program_studi', $mahasiswa->program_studi) == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="agama" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                    <select id="agama" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required>
                        <option value="Kristen" {{ old('agama', $mahasiswa->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('agama', $mahasiswa->agama) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Islam" {{ old('agama', $mahasiswa->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Buddha" {{ old('agama', $mahasiswa->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Hindu" {{ old('agama', $mahasiswa->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Konghucu" {{ old('agama', $mahasiswa->agama) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        <option value="Lainnya" {{ old('agama', $mahasiswa->agama) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <input type="hidden" name="id_user" value="{{ $mahasiswa->id_user }}">

                <div class="flex items-center justify-between">
                    <a href="{{ route('mahasiswa.detail',$mahasiswa->id) }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection