@extends('layouts.base', ["title" => $title ?? "", "description" => $description ?? ""])
@section('content')

<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
                    @php 
                       $route = $user->id === null ? route($route_name_prefix.".store") : route($route_name_prefix.".update", $children);
                    @endphp
                    <form action="{{ $route }}" method="POST" onsubmit="">
                        @csrf
                        @if($user->id)
                            @method("put")
                        @endif
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "nom", "name" => "nom", "value" => $user->nom,])
                            @include("components.input_field", ["label" => "prénom", "name" => "prenom", "value" => $user->prenom,])
                            @include("components.input_field", ["label" => "date naissance", "name" => "date_naissance", "value" => $user->date_naissance,"type"=>"date"])
                        </div>
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "contact", "name" => "contact", "value" => $user->contact,])
                            @include("components.input_field", ["label" => "email", "class" => "col-8", "name" => "email", "value" => $user->email,])
                        </div>
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "pays", "name" => "pays", "value" => $user->pays,])
                            @include("components.input_field", ["label" => "ville", "name" => "ville", "value" => $user->ville,])
                            @include("components.input_field", ["label" => "adresse", "name" => "adresse", "value" => $user->adresse,"optionnal"=>"true"])
                        </div>
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "profession", "class" => "col-6", "name" => "profession", "value" => $user->profession,])
                            @include("components.input_field", ["label" => "carte", "class" => "col-6", "name" => "carte", "value" => $user->carte,"optionnal"=>"true","placeholder" => "(identité, électeur,...)"])
                        </div>
                        @yield("children_content")
                        @if(! $user->id)
                        <div class="form-group form-row">
                            @include("components.input_field", ["label" => "mot de passe", "class" => "col-12", "name" => "password", "value" => "", "type" => "password",])
                            <div class="form-text"><small>Au moins 8 caractères contenant une lettre majuscule,une lettre miniscule,un chiffre et un caractère spécial</small> </div>
                            @include("components.input_field", ["label" => "comfirmer mot de passe", "class" => "col-12", "name" => "password_confirmation", "value" => "", "type" => "password",])
                        </div>
                        @endif
                        
                        <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection