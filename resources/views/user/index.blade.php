@extends('layouts.main')


@section('content')
<div class="container">
  <div class="card m-4">
    <h2 id="title_user">Data User</h2>
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
          <td class="px-6 py-3">
            <!-- Button detail -->
            <a type="button" href="/user/detail/{{ $userData->id }}" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Detail</a>
          
            <!-- //Button edit
            <button type="button" href="/user/edit/{{ $userData->id }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Edit</button> -->

            <!-- //Button delete
            <form action="{{ route('user.delete', ['id' => $userData->id]) }}" method="post">
              @csrf
              @method('delete')
              <input type="hidden" name="_method" value="delete">
              <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
            </form> -->
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection