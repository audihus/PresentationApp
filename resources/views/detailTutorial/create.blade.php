@extends('detailTutorial.layout')

@section('title', 'Create Detail Tutorial')

@section('content')
<!-- Navbar / Header -->
<header class="bg-white shadow p-4 flex justify-between items-center">
  <h1 class="text-2xl font-semibold text-gray-800">Manajemen Master Tutorial</h1>
  <a href="{{ url('/logout') }}" class="text-sm text-red-500 hover:underline">Logout</a>
</header>

<!-- Main Content -->
<div class="max-w-3xl mx-auto px-4 py-8">
  <div class="bg-white shadow-md rounded-xl p-6">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tambah Detail Tutorial</h2>

    <form action="{{ route('detailTutorial.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      
      <input type="hidden" name="master_tutorial_id" value="{{ $master->id }}">

      <div>
        <label class="block font-medium text-gray-700 mb-1">Text</label>
        <textarea name="text" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">{{ old('text') }}</textarea>
      </div>

      <div>
        <label class="block font-medium text-gray-700 mb-1">Gambar</label>
        <input type="file" name="gambar" class="w-full">
      </div>

      <div>
        <label class="block font-medium text-gray-700 mb-1">Code</label>
        <textarea name="code" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 font-mono">{{ old('code') }}</textarea>
      </div>

      <div>
        <label class="block font-medium text-gray-700 mb-1">URL</label>
        <input type="url" name="url" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" value="{{ old('url') }}">
      </div>

      <div>
        <label class="block font-medium text-gray-700 mb-1">Urutan</label>
        <input type="number" name="order" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200" value="{{ old('order') }}">
      </div>

      <div>
        <label class="block font-medium text-gray-700 mb-1">Status</label>
        <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
          <option value="show">Show</option>
          <option value="hide">Hide</option>
        </select>
      </div>
      <div class="flex justify-end">
        <a href="{{ route('detailTutorial.index', $master->id) }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection