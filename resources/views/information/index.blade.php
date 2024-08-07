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
<div class="container">
  <div class="m-10">
    <h1 class="text-4xl text-center text-stone-700 font-bold" id="title_informasi">DATA INFORMASI</h1>
    <div class="m-6">
      <a type="button" href="/information/create" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Tambah Data</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-4">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
          <tr class="text-center">
            <th scope="col" class="px-6 py-3">
              Judul
            </th>
            <th scope="col" class="px-6 py-3">
              Author
            </th>
            <th scope="col" class="px-6 py-3">
              Deskripsi
            </th>
            <th scope="col" class="px-6 py-3">
              Thumbnail
            </th>
            <th scope="col" class="px-6 py-3">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($information as $key => $informationData)
          <tr class="text-center">
            <td class="px-6 py-3 ">{{ $informationData->judul }}</td>
            <td class="px-6 py-3">{{ $informationData->user->nama_user}}</td>
            <td class="truncate max-w-xs px-6 py-3">{{ $informationData->deskripsi }}</td>
            <td class="px-6 py-3">{{ $informationData->thumbnail}}</td>
            <td class="px-6 py-3">
              <!-- Button detail -->
              <div class="my-6">
                <a type="button" href="/information/detail/{{ $informationData->id }}" class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 shadow-lg shadow-purple-500/50 dark:shadow-lg dark:shadow-purple-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Detail</a>
              </div>

              <!-- Button edit -->
              <div class="mt-6 mb-4">
                <a type="button" href="/information/edit/{{ $informationData->id }}" class="text-white my-44 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Edit</a>
              </div>
              
              <!-- Button delete -->
              <form action="{{ route('information.delete', ['id' => $informationData->id]) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="_method" value="delete">
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection