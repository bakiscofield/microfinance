<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = new User();
        // $user->nom = "ogbone";
        // $user->prenom = "fay";
        // $user->date_naissance = "25/02/2002";
        // $user->contact = "12121212";
        // $user->profession = "chauffeur";
        // $user->pays = "togo";
        // $user->ville = "lome";
        // $user->adresse = ["hghgff"];
        // $user->carte = "bhbcfser";
        // $user->email = "fay@gmail.com";
        // $user->password = "1234";

        // $user->save();

        // $clt = new Client();
        // $clt->user_id = User::all()->first()->id;
        // $clt->save();
        $clients = Client::all();
        return view("clients.index")->with([
            "clients" => $clients,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return "Client supprimé";
    }
}
