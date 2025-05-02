@extends('detailTutorial.layout')
@section('title', 'Index Detail Tutorial')
@section('content')
  <!-- Navbar / Header -->
  <header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-gray-800">Data Detail Tutorial</h1>
    <a href="{{ route('logout') }}" class="text-sm text-red-500 hover:underline">Logout</a>
  </header>
  <!-- Main Content -->
  <div class="max-w-7xl mx-auto px-4 py-8">
    <!-- Card -->
    <div class="bg-white shadow-md rounded-xl p-6">
      
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Data Detail Tutorial</h2>
        <a href="{{ route('detailTutorial.create', ['id' => $masterTutorialId]) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Tambah Detail</a>
      </div>

      <!-- Alert -->
      @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
          {{ session('success') }}
        </div>
      @endif

      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300 text-sm">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">Judul Master</th>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">Text</th>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">Gambar</th>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">Code</th>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">URL</th>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">Urutan</th>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">Status</th>
              <th class="px-4 py-2 text-left font-semibold text-gray-700">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($details as $item)
              <tr>
                <td class="px-4 py-2">{{ $item->master->judul ?? '-' }}</td>
                <td class="px-4 py-2">{{ $item->text }}</td>
                <td class="px-4 py-2">
                  @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-24 h-auto rounded shadow">
                  @else
                    -
                  @endif
                </td>
                <td class="px-4 py-2 whitespace-pre-wrap text-gray-800 bg-gray-50 p-2 rounded">{{ $item->code }}</td>
                <td class="px-4 py-2">
                  <a href="{{ $item->url }}" target="_blank" class="text-blue-500 hover:underline break-all">{{ $item->url }}</a>
                </td>
                <td class="px-4 py-2">{{ $item->order }}</td>
                <td class="px-4 py-2">{{ $item->status }}</td>
                <td class="px-4 py-2 space-x-1">
                  <a href="{{ route('detailTutorial.edit', $item->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs transition">Edit</a>
                  <a href="{{ route('detailTutorial.show', $item->id) }}" class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">Show</a>
                  <form id="delete-form-{{ $item->id }}" action="{{ route('detailTutorial.destroy', $item->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $item->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs transition">
                      Hapus
                    </button>
                  </form>                  
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="flex justify-end space-x-2 pt-4">
        <a href="{{ route('masterTutorial.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Kembali</a>
      <!-- Pagination -->
      <div class="mt-6">
        {{ $details->links() }}
      </div>
    </div>
  </div>

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
@endsection
