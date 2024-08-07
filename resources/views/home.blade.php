@extends('layouts.main')


@section('content')
<div class="w-max-full justify-center">
  <div class="relative">
    <img src="{{ asset('assets/images/bg_carousel.jpg') }}" alt="Background" class="w-full h-auto object-cover">
    <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-50 p-4 text-center">
      <h2 class="text-4xl font-bold text-white md:text-4xl mb-4">Penerimaan Mahasiswa Baru Universitas Multi Data Palembang</h2>
      <p class="text-white md:text-xl mb-4">
        Universitas Multi Data Palembang membuka penerimaan mahasiswa baru untuk tahun ajaran 2024/2025.<br>Segera daftarkan diri anda sekarang juga.
      </p>
      @guest
      <a href="/user/register" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">
        Daftar Sekarang
      </a>
      @endguest
    </div>
  </div>
</div>
<div class="container f">
  <div class="font-bold text-2xl m-7">
    Informasi Seputar Penerimaan Mahasiswa Baru
  </div>
  <div class="container mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($information as $info)
      <div class="m-8 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
        <div class="bg-gray-100 py-2 px-6 text-center">
          <h2 class="text-xl font-semibold mb-2">{{ $info->judul }}</h2>
        </div>
        @if($info->thumbnail)
        <img src="{{ asset('storage/' . ($info->thumbnail ?? 'thumbnail_default.jpg')) }}" alt="Thumbnail" class="w-full h-48 object-cover">
        @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
          <span class="text-gray-500">No Thumbnail</span>
        </div>
        @endif

        <div class="p-6 text-center">
          <p class="text-gray-700 break-all truncate">{{ $info->deskripsi }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection