<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercice;
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
        $exercice = Exercice::create($request->all());
        $exercice->clients()->attach(Client::all());
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
        return view("exercices.create_or_edit");
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
