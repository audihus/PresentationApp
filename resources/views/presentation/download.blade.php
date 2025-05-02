<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $tutorial->judul }}</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      background-color: #fff;
      padding: 20px;
    }
    h1 {
      font-size: 24px;
      font-weight: bold;
      color: #1E40AF;
      margin-bottom: 20px;
    }
    .step {
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 6px;
    }
    .step-number {
      display: inline-block;
      background-color: #1E40AF;
      color: #fff;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      text-align: center;
      line-height: 18px;
      font-weight: bold;
      margin-right: 10px;
    }
    h2 {
      font-size: 18px;
      margin: 0;
      margin-bottom: 10px;
      color: #333;
    }
    p {
      margin-bottom: 10px;
      color: #222;
      white-space: pre-line;
    }
    img {
      max-width: 400px;
      height: auto;
      margin-bottom: 10px;
    }
    pre {
      background-color: #2d2d2d;
      color: #fff;
      padding: 10px;
      overflow-x: auto;
      font-size: 12px;
    }
    a {
      color: #1E40AF;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>{{ $tutorial->judul }}</h1>

  @foreach ($details as $detail)
    <div class="step">
      <div>
        <span class="step-number">{{ $detail->order }}</span>
        <h2>Langkah {{ $detail->order }}</h2>
      </div>

      @if ($detail->text)
        <p>{{ $detail->text }}</p>
      @endif

      @if ($detail->gambar)
        <img src="{{ public_path('storage/' . $detail->gambar) }}" alt="Gambar Langkah {{ $detail->order }}">
      @endif

      @if ($detail->code)
        <pre><code>{{ $detail->code }}</code></pre>
      @endif

      @if ($detail->url)
        <p><a href="{{ $detail->url }}">Kunjungi Sumber</a></p>
      @endif
    </div>
  @endforeach
</body>
</html>
