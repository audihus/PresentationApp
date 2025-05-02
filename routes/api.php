<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiMasterTutorialController;

Route::get('/{kelas}', [ApiMasterTutorialController::class, 'index']);

