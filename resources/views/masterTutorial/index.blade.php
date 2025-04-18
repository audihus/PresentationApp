<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body class="bg-gray-100 min-h-screen">
  @php
    $matkul = session('matkul');
    // dd(session()->all());
  @endphp
  <!-- Navbar / Header -->
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-gray-800">Manajemen Master Tutorial</h1>
    <a href="{{ route('logout') }}" class="text-sm text-red-500 hover:underline">Logout</a>
  </header>

  <!-- Main Content -->
  <main class="p-6 max-w-7xl mx-auto">
    <!-- Tombol Tambah -->
    <div class="flex justify-end mb-4">
      <a href="{{ route('masterTutorial.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Master Tutorial
      </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white shadow rounded">
      <table class="min-w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-200 text-xs uppercase">
          <tr>
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Kode Mata Kuliah</th>
            <th class="px-4 py-3">URL Presentation</th>
            <th class="px-4 py-3">URL Finished</th>
            <th class="px-4 py-3">Creator Email</th>
            <th class="px-4 py-3">Created At</th>
            <th class="px-4 py-3">Aksi</th>
            <th class="px-4 py-3">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($masterTutorials as $tutorial)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">{{ $tutorial->judul }}</td>
            <td class="px-4 py-3">{{ $tutorial->kode_matkul }}</td>
            <td class="px-4 py-3 text-blue-600 underline"> <a href="{{ $tutorial->url_presentation }}" target="_blank" > {{ $tutorial->url_presentation }}</a></td>
            <td class="px-4 py-3 text-blue-600 underline"> <a href="{{ $tutorial->url_finished }}" target="_blank" > {{ $tutorial->url_finished }}</a></td>
            <td class="px-4 py-3">{{ $tutorial->creator_email }}</td>
            <td class="px-4 py-3">{{ $tutorial->created_at->format('Y-m-d') }}</td>
            <td class="px-4 py-3 space-x-2">
              <div class="flex space-x-1">
                <a href="{{ route('masterTutorial.show', $tutorial->id) }}" class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Show</a>
                <a href="{{ route('detailTutorial.index', $tutorial->id) }}" class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600">Tutorial</a>
                <a href="{{ route('masterTutorial.edit', $tutorial->id) }}" class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
              </div>
            </td>
            <td>
              <form id="delete-form-{{ $tutorial->id }}" action="{{ route('masterTutorial.destroy', $tutorial->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete({{ $tutorial->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition">
                  Hapus
                </button>
              </form>                  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>

  <script>
    function confirmDelete(id) {
      Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + id).submit();
        }
      });
    }
  </script>  
</body>
</html>