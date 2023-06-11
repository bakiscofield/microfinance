<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Exercice;
use App\Models\ExerciceClient;

class ExerciceClientController extends Controller
{
    public static function getCurrentExerciceInformationByClient(Client $client, Exercice $exercice) : array {
        $exerciceClient = ExerciceClient::where("exercice_id", $exercice->id)->where("client_id", $client->id)->get();
        dd($exerciceClient);
        return $exerciceClient;
    }
}
