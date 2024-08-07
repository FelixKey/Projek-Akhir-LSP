@extends('layouts.main')


@section('content')
<div class="container">
  <div class="w-full max-w-2xl p-4 my-10 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 ">
    <form class="space-y-6" enctype="multipart/form-data" method="POST" action="{{ route('user.store') }}">
      @csrf
      <div>
        <h5 class="text-xl text-center font-semibold text-gray-900 ">Daftar Akun</h5>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
            <input type="text" name="nama_user" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Nama Lengkap" required />
          </div>
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email Anda</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="name@gmail.com" required />
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Kata Sandi</label>
            <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
          </div>
          <div>
            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
          </div>
        </div>
        <div>
          <div>
            <label for="profile_picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Foto Profil</label>
            <input type="file" name="profile_picture" id="profile_picture" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" />
          </div>
          <div>
            <label for="bukti_pembayaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required />
          </div>
        </div>
      </div>
      <div class="flex items-start">
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300" />
          </div>
          <label for="remember" class="ms-2 text-sm font-medium text-gray-900 ">Remember me</label>
        </div>
        <a href="#" class="ms-auto text-sm text-red-700 hover:underline ">Lost Password?</a>
      </div>
      <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar Akun</button>
    </form>
  </div>
  @endsection