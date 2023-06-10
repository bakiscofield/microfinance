<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recolte;
use App\Models\Client;
use App\Models\Exercice;
use App\Models\Employe;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ExerciceClientController::getCurrentExerciceInformationByClient(Client::all()->first(), Exercice::all()->first());
        return view("recoltes.create_or_edit")->with([
            "recolte"=> new Recolte(),
            "clients" => Client::all(), 
            "exercices" => Exercice::all(),
            "jours" => ["1" => "lundi", "2" => "mardi", "3" => "mercredi", "4" => "jeudi", "5" => "vendredi",]
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request['exercice']);
        $request["id_exercice"] = $request['exercice'];
        $request["id_agent"] = Employe::all()->first()->id;
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
}
