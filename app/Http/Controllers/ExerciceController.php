<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exercice;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("exercices.index");
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
        return redirect()->route("exercice.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercice $exercice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercice $exercice)
    {
        //
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
