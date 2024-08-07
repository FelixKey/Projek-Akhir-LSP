@extends('layouts.main')


@section('content')
<div class="flex justify-center items-center p-6">
    <main class="flex items-center justify-center">
        <div class="text-center block w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
            <h1 class="text-2xl font-bold text-red-600 mb-4">Akun Anda Belum Diverifikasi</h1>
            <p class="text-gray-700 mb-6 p-4">
                Terima kasih telah mendaftar. Akun Anda saat ini masih menunggu validasi dari admin.<br>
                Silakan tunggu hingga proses validasi selesai.<br>
            </p>
            <a href="/" class="text-red-700 hover:underline">Kembali ke Home</a>
        </div>
    </main>
</div>

@endsection