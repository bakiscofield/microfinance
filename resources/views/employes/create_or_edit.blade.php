@extends('layouts.users.create_or_edit', ["title" => "Employe", "description" => "Forumulaire d'enregistrement", "route_name_prefix" => "employe","children" => $employe])
@section('children_content')
    <div class="form-group form-row">
    
     @include("components.input_field", ["label" => "Coordonnees", "class" => "col-6", "name" => "coordonnees", "value" => $employe->coordonnees, "type" => "text","optionnal" =>true]) 
     @include("components.input_field", ["label" => "numero service", "class" => "col-6", "name" => "numero_service", "value" => $employe->numero_service, "type" => "text",])
    </div>
    <div class="form-group form-row">
        <select class="form-select" name="status" aria-label="Default select example " >
            <option value="agent">Agent</option>
            <option value="employe">Employe</option>
            <option value="responsable">Responsable</option>
        </select>
    </div>
@endsection