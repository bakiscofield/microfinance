<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {/*
    $user = new User();
    $user->nom = "ogbone";
    $user->prenom = "fay";
    $user->date_naissance = "25/02/2002";
    $user->contact = "12121212";
    $user->profession = "chauffeur";
    $user->pays = "togo";
    $user->ville = "lome";
    $user->adresse = ["hghgff"];
    $user->carte = "bhbcfser";
    $user->email = "fay@gmail.com";
    $user->password = "1234";

    $user->save();

    $clt = new Client();
    $clt->id_utilisateur = User::all()->first()->id;
    $clt->save();
   // dump($user);
    dd(User::all()->first()->client);
    //dump(Client::find(1)->user);
   return view('welcome');
*/
return view('welcome');
});
