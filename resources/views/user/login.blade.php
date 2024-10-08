@extends('layouts.main')


@section('content')
<div class="container">
  
    <div class="w-full max-w-sm p-4 my-14 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
      <form class="space-y-6" method="POST" action="{{route('login')}}">
        @csrf
        <div class="text-center">
          <h5 class="text-xl font-bold text-gray-900 ">Masuk Ke Akun Anda</h5>
        </div>
        <div>
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Email Anda</label>
          <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="name@gmail.com" required />
        </div>
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Kata Sandi</label>
          <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required />
        </div>
        <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login to your account</button>
      </form>

      <div class="flex justify-center mt-6">
        <a href="/user/register" class="text-sm text-red-700 hover:underline ">Belum Punya Akun ?</a>
      </div>
    </div>
    <div>
     
    </div>
  </div>
</div>
</div>
</div>
@endsection