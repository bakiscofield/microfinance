<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ExerciceController;
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

Route::get('client/list', [ClientController::class, 'index'])->name("client.index");
Route::get('client/formulaire/creation', [ClientController::class, 'create'])->name("client.create");
Route::get('client/formulaire/edition/{client}', [ClientController::class, 'edit'])->name("client.edit");
Route::post('client/enregistrement', [ClientController::class, 'store'])->name("client.store");
Route::put('client/mis_a_jours/{client}', [ClientController::class, 'update'])->name("client.update");
Route::get('client/{client}', [ClientController::class, 'show'])->name("client.show");
Route::delete('client/{client}', [ClientController::class, 'destroy'])->name("client.destroy");

Route::get('exercice/list', [ExerciceController::class, 'index'])->name("exercice.index");
Route::get('exercice/formulaire/creation', [ExerciceController::class, 'create'])->name("exercice.create");
Route::get('exercice/formulaire/edition/{client}', [ExerciceController::class, 'edit'])->name("exercice.edit");
Route::post('exercice/enregistrement', [ExerciceController::class, 'store'])->name("exercice.store");
Route::put('exercice/mis_a_jours/{client}', [ExerciceController::class, 'update'])->name("exercice.update");
Route::get('exercice/{exercice}', [ExerciceController::class, 'show'])->name("exercice.show");
Route::delete('exercice/{exercice}', [ExerciceController::class, 'destroy'])->name("exercice.destroy");

//Route::resource('employe', EmployeController::class);