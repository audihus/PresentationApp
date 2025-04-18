<?php

namespace App\Http\Controllers;
use App\Models\MasterTutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterTutorialController extends Controller
{
    // Tampilkan semua data master tutorial
    public function index()
    {
        $masterTutorials = MasterTutorial::orderBy('created_at', 'desc')->get();
        return view('masterTutorial.index', compact('masterTutorials'));
    }

    // Simpan data tutorial baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kode_matkul' => 'required|string|max:100',
            'creator_email' => 'required|email',
        ]);

        $uniqueNumber = uniqid();

        $tutorial = new MasterTutorial();
        $tutorial->judul = $request->judul;
        $tutorial->kode_matkul = $request->kode_matkul;
        $tutorial->creator_email = $request->creator_email;

        $tutorial->save();

        $slug = Str::slug($tutorial->judul);
        $id = $tutorial->id;

        $tutorial->url_presentation = url("/presentation/{$slug}-{$id}");
        $tutorial->url_finished = url("/presentation/{$slug}-{$id}/{$uniqueNumber}");

        $tutorial->save();

        return redirect()->route('masterTutorial.index')->with('success', 'Tutorial berhasil ditambahkan.');
    }

    // Tampilkan form edit (opsional kalau modal)
    public function edit($id)
    {
        $tutorial = MasterTutorial::findOrFail($id);
        return view('masterTutorial.edit', compact('tutorial'));
    }

    public function create()
    {
        return view('masterTutorial.create');
    }

    // Update data tutorial
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kode_matkul' => 'required|string|max:100',
            'url_presentation' => 'required|url',
            'url_finished' => 'required|url',
            'creator_email' => 'required|email',
        ]);

        $tutorial = MasterTutorial::findOrFail($id);
        $tutorial->update($request->all());

        return redirect()->route('masterTutorial.index')->with('success', 'Tutorial berhasil diperbarui.');
    }

    // Hapus data tutorial
    public function destroy($id)
    {
        $tutorial = MasterTutorial::findOrFail($id);
        $tutorial->delete();

        return redirect()->back()->with('success', 'Tutorial berhasil dihapus.');
    }

    public function show(MasterTutorial $masterTutorial) 
    {
        return view('masterTutorial.show', compact('masterTutorial'));
    }
}
