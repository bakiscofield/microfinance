<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExerciceClient;
use App\Models\Client;


class ExerciceClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(ExerciceClient::all()->first()->client);
        return view("exercices_clients.index")->with(
            [
            "exercices_clients" => ExerciceClient::all(),
            ]
        );
    }

    public static function getCurrentExerciceInformationByClient(Client $client) : String {
        return $client->getCurrentTontineInfo();
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //ExerciceClient()
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
