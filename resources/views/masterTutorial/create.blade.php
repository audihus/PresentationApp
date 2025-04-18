<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gray-100 min-h-screen">
  <!-- Navbar / Header -->
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-gray-800">Manajemen Master Tutorial</h1>
    <a href="{{ route('logout') }}" class="text-sm text-red-500 hover:underline">Logout</a>
  </header>

  <!-- Main Content -->
  <main class="p-6 max-w-7xl mx-auto">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Form Master Tutorial</h2>

    <form action="{{ route('masterTutorial.store') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label class="block mb-1 font-medium">Judul</label>
        <input type="text" name="judul" class="w-full border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200" required>
      </div>

      <div>
        <label class="block mb-1 font-medium">Kode Mata Kuliah</label>
        <select name="kode_matkul" required class="...">
          <option value="">-- Pilih Kode Mata Kuliah --</option>
          @foreach(session('matkul') as $m)
            <option value="{{ $m['kdmk'] }}">{{ $m['kdmk'] }} - {{ $m['nama'] }}</option>
          @endforeach
        </select>
      </div>
      
      <input type="hidden" name="creator_email" value="{{ session('email') }}" >

      <!-- Tombol Aksi -->
      <div class="flex justify-end space-x-2 pt-4">
        <a href="{{ route('masterTutorial.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Batal</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>

  </main>
</body>
</html>