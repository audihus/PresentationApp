

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Detail Master Tutorial</title>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <main class="p-6 max-w-4xl mx-auto bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Detail Tutorial</h1>
    
        <div class="mb-4">
            <strong>Master Tutorial ID:</strong> {{ $detailTutorial->master_tutorial_id }}
        </div>
    
        <div class="mb-4">
            <strong>Text:</strong> {{ $detailTutorial->text ?? '-' }}
        </div>
    
        <div class="mb-4">
            <strong>Code:</strong> 
            <pre class="bg-gray-100 p-2 rounded">{{ $detailTutorial->code ?? '-' }}</pre>
        </div>
    
        <div class="mb-4">
            <strong>URL:</strong> 
            @if($detailTutorial->url)
                <a href="{{ $detailTutorial->url }}" target="_blank" class="text-blue-600 underline">{{ $detailTutorial->url }}</a>
            @else
                -
            @endif
        </div>
    
        <div class="mb-4">
            <strong>Gambar:</strong><br>
            @if($detailTutorial->gambar)
                <img src="{{ asset('storage/'.$detailTutorial->gambar) }}" alt="Gambar" class="w-1/2 rounded">
            @else
                Tidak ada gambar.
            @endif
        </div>
    
        <div class="mb-4">
            <strong>Order:</strong> {{ $detailTutorial->order }}
        </div>
    
        <div class="mb-4">
            <strong>Status:</strong> {{ ucfirst($detailTutorial->status) }}
        </div>
    
        <a href="{{ route('detailTutorial.index', ['id' => $detailTutorial->master_tutorial_id]) }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            Kembali
        </a>
    </main>
</body>
</html>
