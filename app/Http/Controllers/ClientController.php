<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Exercice;
use App\Exports\ClientsExport;
use App\Models\ExerciceClient;
use App\Http\Requests\StoreUserRequest;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $user = new User();
        $user->nom = "Tamba";
        $user->prenom = "dialo";
        $user->date_naissance = "25/02/2002";
        $user->contact = "12121212";
        $user->profession = "chauffeur";
        $user->pays = "togo";
        $user->ville = "lome";
        $user->adresse = "hghgff";
        $user->carte = "bhbcfser";
        $user->email = "fay@gmail.com";
        $user->password = "123456789";
        $client = new Client();
        $client->user_id = $user->id;
        $jours = ["1" => "lundi", "2" => "mardi", "3" => "mercredi", "4" => "jeudi", "5" => "vendredi",];
        return view("clients.create_or_edit", compact("client", "user", "jours"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user = User::create($request->all());

        $client = Client::create([
            "user_id" => $user->id,
        ]);

        // ExerciceClient::create([
        //     "exercice_id" => Exercice::currentExercice()->id,
        //     "client_id" => $client->id,
        //     "montant_journalier" => $request->input("montant_journalier", 200),
        //     "jour_recolte" => $request->input("jour_recolte", 0),
        // ]);

        return redirect()->route("client.index");
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
        $user = $client->user;
        return view("clients.create_or_edit", compact("client", "user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, Client $client)
    {
        $client->user->update($request->all());
        return redirect()->route("client.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route("client.index");
    }

    public function export()
    {
        return Excel::download(new ClientsExport, 'user.xlsx');
    }
}
