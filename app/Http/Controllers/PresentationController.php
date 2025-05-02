<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetailTutorial;
use App\Models\MasterTutorial;
use Illuminate\Support\Str;

class PresentationController extends Controller
{
    public function show($slugId)
    {
        // Pisahkan slug dan ID
        $id = intval(Str::afterLast($slugId, '-'));

        // Ambil master tutorial berdasarkan ID
        $tutorial = MasterTutorial::findOrFail($id);

        // Ambil detail tutorial yang statusnya "show", urutkan berdasarkan nomor urut
        $details = DetailTutorial::where('master_tutorial_id', $id)
                    ->where('status', 'show')
                    ->orderBy('order')
                    ->get();

        return view('presentation.show', compact('tutorial', 'details'));
    }   
    
    public function finished($slugId, $unique)
    {
        $id = intval(Str::afterLast($slugId, '-'));
        
        $tutorial = MasterTutorial::findOrFail($id);

        $details =  DetailTutorial::where('master_tutorial_id', $id)
                    ->orderBy('order')
                    ->get();

        return view('presentation.finished', compact('tutorial', 'details', 'unique', 'slugId'));
    }

    public function downloadPDF($slugId, $unique)
    {
        $id = intval(Str::afterLast($slugId, '-'));
        $tutorial = MasterTutorial::findOrFail($id);

        $details = DetailTutorial::where('master_tutorial_id', $id)
                   ->orderBy('order')
                   ->get();

        return pdf::loadView('presentation.download', compact('tutorial', 'details' ))->download("tutorial-{$slugId}.pdf");
    }
}
