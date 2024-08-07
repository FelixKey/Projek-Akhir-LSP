@extends('layouts.main')


@section('content')
<main class="container mx-auto p-6">
    <div class="text-center block w-full p-6 bg-white border border-gray-200 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-4">Kontak Kami</h2>
        <p class="mb-4">Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami. Kami siap membantu Anda dengan segala kebutuhan terkait pendaftaran mahasiswa baru.</p>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Contact Information -->
            <div class="bg-gray-50 p-6 border border-gray-200 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-2">Informasi Kontak</h3>
                <p class="mb-4">Anda dapat menghubungi kami melalui:</p>
                <ul class="mb-4">
                    <li class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18M3 6h18M3 18h18"></path>
                        </svg>
                        <span>Alamat: Jl. Contoh No. 123, Palembang</span>
                    </li>
                    <li class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <span>Telepon: (0711) 123-4567</span>
                    </li>
                    <li class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10v8H7V8z"></path>
                        </svg>
                        <span>Email: <a href="mailto:info@example.com" class="text-red-600 underline">info@example.com</a></span>
                    </li>
                </ul>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-50 p-6 border border-gray-200 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-2">Kirim Pesan</h3>
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 mb-2">Nama</label>
                        <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                        <textarea id="message" name="message" rows="4" class="w-full p-3 border border-gray-300 rounded" required></textarea>
                    </div>
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection