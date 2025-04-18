<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTutorial;
use App\Models\MasterTutorial;
use Illuminate\Support\Facades\Storage;

class DetailTutorialController extends Controller
{
    public function index($id)
    {
        $details = DetailTutorial::with('master')
        ->where('master_tutorial_id', $id)
        ->orderBy('order')
        ->paginate(10);
        return view('detailTutorial.index', compact('details'))->with('masterTutorialId', $id);
    }

    public function create($id)
    {
        $master = MasterTutorial::findOrFail($id);
        return view('detailTutorial.create', compact('master'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'master_tutorial_id' => 'required|exists:master_tutorials,id',
            'text' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'code' => 'nullable|string',
            'url' => 'nullable|url',
            'order' => 'required|integer',
            'status' => 'required|in:show,hide',
        ]);

        $data = $request->only(['master_tutorial_id', 'text', 'code', 'url', 'order', 'status']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('tutorials', 'public');
        }

        DetailTutorial::create($data);

        return redirect()->route('detailTutorial.index', ['id' => $request->master_tutorial_id])->with('success', 'Detail tutorial berhasil ditambahkan.');
    }

    public function edit($detailTutorialId)
    {
        $detail = DetailTutorial::findOrFail($detailTutorialId);
        return view('detailTutorial.edit', compact('detail'));
    }

    public function update(Request $request, DetailTutorial $detailTutorialId)
    {
        $request->validate([
            'master_tutorial_id' => 'required|exists:master_tutorials,id',
            'text' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'code' => 'nullable|string',
            'url' => 'nullable|url',
            'order' => 'required|integer',
            'status' => 'required|in:show,hide',
        ]);

        $data = $request->only(['master_tutorial_id', 'text', 'code', 'url', 'order', 'status']);
    
        if ($request->hasFile('gambar')) {
            if ($detailTutorialId->gambar && Storage::disk('public')->exists($detailTutorialId->gambar)) {
                Storage::disk('public')->delete($detailTutorialId->gambar);
            }
    
            $data['gambar'] = $request->file('gambar')->store('tutorials', 'public');
        }
    
        $detailTutorialId->update($data);
    
        return redirect()->route('detailTutorial.index', ['id' => $detailTutorialId->master_tutorial_id])
                 ->with('success', 'Detail tutorial berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $detail = DetailTutorial::findOrFail($id);
        $masterId = $detail->master_tutorial_id;
        if ($detail->gambar) {
            Storage::disk('public')->delete($detail->gambar);
        }

        $detail->delete();

        return redirect()->route('detailTutorial.index', ['id' => $masterId])->with('success', 'Data berhasil dihapus');
    }

    public function show($detailTutorialId)
    {
        $detailTutorial = DetailTutorial::findOrFail($detailTutorialId);
        return view('detailTutorial.show', compact('detailTutorial'));
    }
}
