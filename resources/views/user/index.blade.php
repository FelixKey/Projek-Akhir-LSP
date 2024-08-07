@extends('layouts.main')


@section('content')
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
<div class="flex flex-col mx-4">
  <div class="m-10">
    <h1 class="text-4xl text-center font-bold text-stone-700" id="title_user">DATA USER</h1>
  </div>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr class="text-center">
          <th scope="col" class="px-6 py-3">
            ID User
          </th>
          <th scope="col" class="px-6 py-3">
            Nama
          </th>
          <th scope="col" class="px-6 py-3">
            Email
          </th>
          <th scope="col" class="px-6 py-3">
            Role
          </th>
          <th scope="col" class="px-6 py-3">
            Bukti Pembayaran
          </th>
          <th scope="col" class="px-6 py-3">
            Status Akun
          </th>
          <th scope="col" class="px-6 py-3">
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($user as $key => $userData)
        <tr class="text-center">
          <td class="px-6 py-3 ">{{ $userData->id }}</td>
          <td class="px-6 py-3">{{ $userData->nama_user }}</td>
          <td class="px-6 py-3">{{ $userData->email }}</td>
          <td class="px-6 py-3">{{ $userData->role->nama_role }}</td>
          <td class="px-6 py-3">{{ $userData->bukti_pembayaran }}</td>
          <td class="px-6 py-3">{{ $userData->status }}</td>
          <td class="px-6 py-3">
            <!-- Button detail -->
            <a type="button" href="/user/detail/{{ $userData->id }}" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Detail</a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection