<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\RecolteController;
use App\Http\Controllers\ExerciceClientController;
use App\Models\User;
use App\Models\Client;
use App\Models\Employe;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});
//client's routes
Route::get('client/list', [ClientController::class, 'index'])->name("client.index");
Route::get('client/formulaire/creation', [ClientController::class, 'create'])->name("client.create");
Route::get('client/formulaire/edition/{client}', [ClientController::class, 'edit'])->name("client.edit");
Route::post('client/enregistrement', [ClientController::class, 'store'])->name("client.store");
Route::put('client/mis_a_jours/{client}', [ClientController::class, 'update'])->name("client.update");
Route::get('client/{client}', [ClientController::class, 'show'])->name("client.show");
Route::delete('client/{client}', [ClientController::class, 'destroy'])->name("client.destroy");
//Exportation
Route::get('export', [ClientController::class, 'export'])->name("client.export");

Route::get('exercice/list', [ExerciceController::class, 'index'])->name("exercice.index");
Route::get('exercice/formulaire/creation', [ExerciceController::class, 'create'])->name("exercice.create");
Route::get('exercice/formulaire/edition/{client}', [ExerciceController::class, 'edit'])->name("exercice.edit");
Route::post('exercice/enregistrement', [ExerciceController::class, 'store'])->name("exercice.store");
Route::put('exercice/mis_a_jours/{client}', [ExerciceController::class, 'update'])->name("exercice.update");
Route::get('exercice/{exercice}', [ExerciceController::class, 'show'])->name("exercice.show");
Route::delete('exercice/{exercice}', [ExerciceController::class, 'destroy'])->name("exercice.destroy");

//employe's routes
Route::get('employe/list', [EmployeController::class, 'index'])->name("employe.index");
Route::get('employe/formulaire/creation', [EmployeController::class, 'create'])->name("employe.create");
Route::get('employe/formulaire/edition/{employe}', [EmployeController::class, 'edit'])->name("employe.edit");
Route::post('employe/enregistrement', [EmployeController::class, 'store'])->name("employe.store");
Route::put('employe/mis_a_jours/{employe}', [EmployeController::class, 'update'])->name("employe.update");
Route::get('employe/{employe}', [EmployeController::class, 'show'])->name("employe.show");
Route::delete('employe/{employe}', [EmployeController::class, 'destroy'])->name("employe.destroy");

// Récolte routes
Route::get('recoltes/formulaire/creation/{exerciceClient}', [RecolteController::class, 'create_recolte_client'])->name("recolte_client.create");
Route::get('client/current_tontine_info/{client}', [ExerciceClientController::class, 'getCurrentExerciceInformationByClient'])->name("client_info.get");

Route::resource('recolte', RecolteController::class);
Route::resource('exercices_clients', ExerciceClientController::class);

require __DIR__.'/auth.php';
