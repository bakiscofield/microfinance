<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recolte;
use App\Models\Client;
use App\Models\Exercice;
use App\Models\Employe;
use App\Models\ExerciceClient;
use App\Exports\RecoltesExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class RecolteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Recolte::all());
        return view("recoltes.index")->with(
            [
            "recoltes" => Recolte::all(),
            ]
        );
    }

    public function create_recolte_client(Request $request, ExerciceClient $exerciceClient)
    {
        return view("recoltes.create_or_edit")->with([
            "recolte"=> new Recolte(),
            "clients" => Client::all(), 
            "exerciceClient" => $exerciceClient,
            "exercices" => Exercice::all(),
            "recoltes_client" => [],
            "jours" => ["1" => "lundi", "2" => "mardi", "3" => "mercredi", "4" => "jeudi", "5" => "vendredi",]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $current_exercice = Exercice::currentExercice();
        //dd($current_exercice->date_debut->format("F"));
        return view("recoltes.create_or_edit")->with([
            "recolte"=> new Recolte(),
            "current_exercice" => $current_exercice,
            "clients" => Client::all(), 
            "exercices" => Exercice::all(),
            "recoltes_client" => [],
            "jours" => ["1" => "lundi", "2" => "mardi", "3" => "mercredi", "4" => "jeudi", "5" => "vendredi",],
            "to_day" => Carbon::now()->format("d-m-Y"),
            "mounth" => $current_exercice->date_debut->format("F"),
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request["exercice_client_id"] = Client::find($request->id_client)->getCurrentExerciceClient()->id;
        Recolte::create($request->all());   
        return redirect()->route("recolte.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export()
    {
        return Excel::download(new RecoltesExport, 'recoltes.xlsx');
    }
}
