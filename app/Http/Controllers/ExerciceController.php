<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercice;
use App\Models\ExerciceClient;
use App\Models\Client;


class ExerciceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("exercices.index")->with(["exercices"=>Exercice::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("exercices.create_or_edit")->with(
            [
                "exercice" => new Exercice(),
                "clients" => Client::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_range = $request->input('date_debut');
        //dd($date_range);
        $liste = explode(" ",$date_range);
        
        $request['date_debut'] = $liste[0];
        $request['date_fin'] = $liste[2];
        $exercice = Exercice::create($request->all());
        foreach(Client::all() as $client){
            ExerciceClient::create([
                "exercice_id" => $exercice->id,
                "client_id" => $client->id,
            ]);
        }
        return redirect()->route("exercice.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercice $exercice)
    {
        return view("exercice.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercice $exercice)
    {
        //dd("OKAY");
        $clients = Client::all();
        return view("exercices.create_or_edit", compact("exercice", "clients"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercice $exercice)
    {
        return redirect()->route("exercice.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercice $exercice)
    {
        $exercice->delete();
        return redirect()->route("exercice.index");
    }
}
