<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\RecolteController;
use App\Http\Controllers\ExerciceClientController;
use App\Http\Controllers\RapportController;
use App\Models\User;
use App\Models\Client;
use App\Models\Employe;
use App\Models\Exercice;
use App\Models\Recolte;
use App\Models\Zone;

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
})->name("welcome");

Route::get('/dashboard', function () {
    $latestUsers = User::latest()->take(7)->get();
    $latestRecoltes = Recolte::latest()->take(7)->get();
    $nbreClients = Client::all()->count();
    $nbreZones = Zone::all()->count();
    $nbreTontines = Exercice::all()->count();
    $montantRecoltes = Recolte::all()->sum('montant');


    $data = [
        'latestUsers' => $latestUsers,
        'latestRecoltes' => $latestRecoltes,
        'nbreClients' => $nbreClients,
        'nbreZones' => $nbreZones,
        'nbreTontines' => $nbreTontines,
        'montantRecoltes' => $montantRecoltes,
    ];

    return view('dashboard', $data);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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

});

// Actual day report generation
Route::get('/generate-today-report', [RapportController::class, 'generateTodayReport'])->name("generate.report");

//client's routes
Route::get('client/list', [ClientController::class, 'index'])->name("client.index");
Route::get('client/formulaire/creation', [ClientController::class, 'create'])->name("client.create");
Route::get('client/formulaire/edition/{client}', [ClientController::class, 'edit'])->name("client.edit");
Route::post('client/enregistrement', [ClientController::class, 'store'])->name("client.store");
Route::put('client/mis_a_jours/{client}', [ClientController::class, 'update'])->name("client.update");
Route::get('client/{client}', [ClientController::class, 'show'])->name("client.show");
Route::delete('client/{client}', [ClientController::class, 'destroy'])->name("client.destroy");

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
Route::get('exportRecolte', [RecolteController::class, 'export'])->name("recolte.export");
Route::resource('exercices_clients', ExerciceClientController::class);

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



require __DIR__.'/auth.php';
