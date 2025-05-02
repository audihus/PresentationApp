<?php 
namespace App\Http\Controllers;

use App\Models\MasterTutorial;
use Illuminate\Http\Request;

class ApiMasterTutorialController extends Controller
{
    public function index($kelas)
    {
        $tutorials = MasterTutorial::all()->where('kode_matkul',$kelas);

        if($tutorials->isEmpty()){
            return response()->json([
                'status' => [
                    'code' => 404,
                    'description' => 'Not found data ' . $kelas,
                ]
            ],404);
        }

        $result = $tutorials->map(function ($t) {
            return [
                'kode_matkul' => $t->kode_matkul,
                'nama_matkul' => $t->nama_matkul,
                'judul' => $t->judul,
                'url_presentation' => $t->url_presentation,
                'url_finished' => $t->url_finished,
                'creator_email' => $t->creator_email,
                'created_at' => $t->created_at->toDateTimeString(),
                'updated_at' => $t->updated_at->toDateTimeString(),
            ];
        });

        return response()->json($result);
    }
}


?>