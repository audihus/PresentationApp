<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Detail Master Tutorial</title>
</head>
<body class="bg-gray-100 min-h-screen p-6">
  <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-2xl font-bold mb-4">Detail Master Tutorial</h1>

    <div class="mb-4">
      <span class="font-semibold text-gray-700">Judul:</span>
      <p class="text-gray-900">{{ $masterTutorial->judul }}</p>
    </div>

    <div class="mb-4">
      <span class="font-semibold text-gray-700">Id master tutorial:</span>
      <p class="text-gray-900">{{ $masterTutorial->id }}</p>
    </div>

    <div class="mb-4">
      <span class="font-semibold text-gray-700">Kode mata kuliah:</span>
      <p class="text-gray-900">{{ $masterTutorial->kode_matkul }}</p>
    </div>

    <div class="mb-4">
      <span class="font-semibold text-gray-700">Url presentation:</span>
      <p> <a href="{{ $masterTutorial->url_presentation }}"> {{ $masterTutorial->url_presentation }} </a></p>
    </div>

    <div class="mb-4">
      <span class="font-semibold text-gray-700">Url finished:</span>
      <p><a href="{{ $masterTutorial->url_finished }}"> {{ $masterTutorial->url_finished }} </a></p>
    </div>

    <div class="mb-4">
      <span class="font-semibold text-gray-700">Email pembuat:</span>
      <p class="text-gray-900">{{ $masterTutorial->creator_email }}</p>
    </div>

    <a href="{{ route('masterTutorial.index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali</a>
  </div>
</body>
</html>
