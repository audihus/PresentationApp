<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $tutorial->judul }}</title>
  <meta http-equiv="refresh" content="30">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-3xl font-bold mb-6 text-blue-800">{{ $tutorial->judul }}</h1>
  {{-- @php
      dd($unique)
  @endphp --}}

  @foreach ($details as $detail)
    <div class="bg-white p-4 rounded shadow mb-4">
      <div class="flex items-center mb-3">
        <div class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-600 text-white font-bold mr-3">
          {{ $detail->order }}
        </div>
        <h2 class="text-lg font-semibold text-gray-700">Langkah {{ $detail->order }}</h2>
      </div>

      {{-- Text --}}
      @if ($detail->text)
        <p class="mb-2 text-gray-800 whitespace-pre-line">{{ $detail->text }}</p>
      @endif

      {{-- Gambar --}}
      @if ($detail->gambar)
        <img src="{{ asset('storage/' . $detail->gambar) }}" class="mb-2 max-w-xs rounded shadow">
      @endif

      {{-- Code --}}
      @if ($detail->code)
        <pre class="bg-gray-800 text-white p-3 rounded overflow-x-auto text-sm"><code>{{ $detail->code }}</code></pre>
      @endif

      {{-- URL --}}
      @if ($detail->url)
        <div class="mt-2">
          <a href="{{ $detail->url }}" class="text-blue-600 underline" target="_blank">Kunjungi Sumber</a>
        </div>
      @endif
    </div>
  @endforeach
  
  <a href="{{ route('presentation.download', ['slugId' => $slugId,'unique' => $unique]) }}"
  class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
    Download PDF  
  </a>

  <p class="text-sm text-gray-400 text-center mt-8">Halaman ini otomatis memperbarui setiap 5 detik</p>
</body>
</html>
