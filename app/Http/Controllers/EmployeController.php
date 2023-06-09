<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;
use App\Models\Zone;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        return view("employes.index")->with([
            "employes" => $employes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zone = new Zone();
        $zone->nom = "sokode ville";
        //$zone->save();
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
        //$user->save();
        $employe = new Employe();
        $employe->user_id = $user->id;
        $employe->id_zone = $zone->id;
        $employe->numero = "12345678";
        $employe->coordonnees = "x,y";
        $employe->status = "agent";
        //$employe->save();
        return view("employes.create_or_edit", compact("employe", "user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $zone = Zone::create($request->all());
        Employe::create([
            "user_id" => $user->id,
            "id_zone" => $zone->id,
            "status" => "agent",
            "coordonnees" => "x,y",
            "numero" => "45454545",

        ]);

        return redirect()->route("employe.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        $user = $employe->user;
        return view("employes.create_or_edit", compact("employe", "user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employe $employe)
    {
        $employe->user->update($request->all());
        return redirect()->route('employe.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect()->route("employe.index");
    }
}
