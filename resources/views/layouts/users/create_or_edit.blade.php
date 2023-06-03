@extends('layouts.base', ["title" => $title ?? "", "description" => $description ?? ""])
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route($route_name_prefix.'.store') }}" method="POST" onsubmit="">
                        @csrf
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "nom", "name" => "nom", "value" => $user->nom,])
                            @include("components.input_field", ["label" => "prénom", "name" => "prenom", "value" => $user->prenom,])
                            @include("components.input_field", ["label" => "date naissance", "name" => "date_naissance", "value" => $user->date_naissance,])
                        </div>
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "contact", "name" => "contact", "value" => $user->contact,])
                            @include("components.input_field", ["label" => "email", "class" => "col-8", "name" => "email", "value" => $user->email,])
                        </div>
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "pays", "name" => "pays", "value" => $user->pays,])
                            @include("components.input_field", ["label" => "ville", "name" => "ville", "value" => $user->ville,])
                            @include("components.input_field", ["label" => "adresse", "name" => "adresse", "value" => $user->adresse,])
                        </div>
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "profession", "class" => "col-6", "name" => "profession", "value" => $user->profession,])
                            @include("components.input_field", ["label" => "carte", "class" => "col-6", "name" => "carte", "value" => $user->carte,])
                        </div>
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "mot de passe", "class" => "col-6", "name" => "password", "value" => "", "type" => "password",])
                            @include("components.input_field", ["label" => "comfirmer mot de passe", "class" => "col-6", "name" => "comfirm_password", "value" => "", "type" => "password",])
                        </div>
                        @yield("children_content")
                        <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection