<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recolte;
use App\Models\Client;


class RecolteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view("recoltes.create_or_edit")->with(["recolte"=> new Recolte(),"clients" => Client::all()]);
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
