<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterTutorialController;
use App\Http\Controllers\DetailTutorialController;
use App\Http\Controllers\PresentationController;
use App\Models\DetailTutorial;

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware(['check.token'])->group(function (){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::resource('masterTutorial', MasterTutorialController::class);
    /*
    HTTP         Method	                    URL	Name	            Controller Method
    GET	        /masterTutorial	            masterTutorial.index	index
    GET	        /masterTutorial/create	    masterTutorial.create	create
    POST	    /masterTutorial	            masterTutorial.store	store
    GET	        /masterTutorial/{id}	    masterTutorial.show  	show
    GET	        /masterTutorial/{id}/edit	masterTutorial.edit	    edit
    PUT/PATCH	/masterTutorial/{id}	    masterTutorial.update	update
    DELETE	    /masterTutorial/{id}	    masterTutorial.destroy	destroy
    */

    Route::get('detailTutorial/{id}', [DetailTutorialController::class, 'index'])->name('detailTutorial.index');
    Route::get('detailTutorial/create/{id}', [DetailTutorialController::class, 'create'])->name('detailTutorial.create');
    Route::delete('/detailTutorial/{id}/delete', [DetailTutorialController::class, 'destroy'])->name('detailTutorial.destroy');
    Route::post('detailTutorial', [DetailTutorialController::class, 'store'])->name('detailTutorial.store');
    Route::get('detailTutorial/{detailTutorialId}/edit', [DetailTutorialController::class, 'edit'])->name('detailTutorial.edit');
    Route::put('/detailTutorial/{detailTutorialId}/update', [DetailTutorialController::class, 'update'])->name('detailTutorial.update');
    Route::get('/detailTutorial/{detailTutorialId}/show', [DetailTutorialController::class, 'show'])->name('detailTutorial.show');
});

Route::get('/presentation/{slugId}/{unique}', [PresentationController::class, 'finished'])->name('presentation.finished');
Route::get('/presentation/{slugId}', [PresentationController::class, 'show'])->name('presentation.view');
