@extends('layouts.users.create_or_edit', ["title" => "Employe", "description" => "Forumulaire d'enregistrement", "route_name_prefix" => "employe"])
@section('children_content')
    <div class="form-group form-row">
     @include("components.input_field", ["label" => "Status", "class" => "col-4", "name" => "status", "value" => $employe->status, "type" => "text",]) 
     @include("components.input_field", ["label" => "Coordonnees", "class" => "col-4", "name" => "coordonnees", "value" => $employe->coordonnees, "type" => "text",]) 
     @include("components.input_field", ["label" => "numero", "class" => "col-4", "name" => "numero", "value" => $employe->numero, "type" => "text",])
    </div>
@endsection