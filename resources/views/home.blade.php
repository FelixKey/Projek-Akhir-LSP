@extends('layouts.main')


@section('content')
<div class="flex">
  <img src="assets/images/bg_carousel.jpg" class="w-full opacity-40" alt="background">
  <div class="text-overlay text-center absolute content-center p-32 mt-60">
    <h2 class="text-4xl font-bold text-gray-800 md:text-4xl">Penerimaan Mahasiswa Baru Universitas Multi Data Palembang</h2>
    <p class="text-gray-800 md:text-xl">
      Universitas Multi Data Palembang membuka penerimaan mahasiswa baru untuk tahun ajaran 2024/2025.<br>Segera daftarkan diri anda sekarang juga.
    </p>
    <button class="bg-red-500 hover:bg-red-700 text-slate-50 font-bold py-2 px-4 rounded">
      <a href="/register">Daftar Sekarang</a>
    </button>
  </div>
</div>
<div class="container">
  <div class="font-bold text-2xl m-7">
    Informasi Seputar Penerimaan Mahasiswa Baru
  </div>
  <div class="card-1">
    <div class="max-w-sm m-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <a href="#">
        <img class="rounded-t-lg" src="assets/images/bg_carousel.jpg" alt="" />
      </a>
      <div class="p-5">
        <a href="#">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
          Read more
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
      </div>
    </div>
    <div class="max-w-sm m-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <a href="#">
        <img class="rounded-t-lg" src="assets/images/bg_carousel.jpg" alt="" />
      </a>
      <div class="p-5">
        <a href="#">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
          Read more
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
      </div>
    </div>

  </div>

</div>
@endsection