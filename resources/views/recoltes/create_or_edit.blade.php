@extends('layouts.base', ["title" => $title ?? "Enregistrer une récolte", "description" => $description ?? ""])
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="text-uppercase">Date : </h4>
            <h4 class="text-uppercase">Jour : Lundi</h4>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
                    @php 
                       $route = $recolte->id === null ? route("recolte.store") : route("recolte.update", $children);
                    @endphp
                    <form action="{{ $route }}" method="POST" onsubmit="">
                        @csrf
                        @if($recolte->id)
                            @method("put")
                        @endif
                        <div class="col-md-12">
                            <label for="exercice">Exercice</label>
                            <select name="exercice" id="exercice" class="form-control mb-4">
                                <option value="">Séléctionner un exercice</option>
                                @foreach($exercices as $exercice)
                                <option value="{{ $exercice->id }}">{{ $exercice->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row col-md-12">
                            <div class="col-md-2 mt-4">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="edit_recolt_iformation" name="edit_recolt_iformation" checked>
                                    <label class="custom-control-label" for="edit_recolt_iformation">Modifier</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="client">Client</label>
                                <select name="client" id="client" class="form-control mb-4">
                                    <option value="">Séléctionner un client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->user->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="client">Jour de cotisation</label>
                                <select name="client" id="client" class="form-control mb-4">
                                    <option value="">Séléctionner un jour</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->user->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @include("components.input_field", ["label" => "Montant journalier", "name" => "montant_journalier", "value" => "", "type" => "number", "class" => "col-md-12 mb-4"])
                        <div class="mb-4 form-row col-md-12">
                            @include("components.input_field", ["label" => "Montant cotisé", "name" => "montant", "value" => "", "type" => "number", "class" => "col-md-8"])
                            @include("components.input_field", ["label" => "Montant restant", "name" => "montant", "value" => "", "type" => "number", "class" => "col-md-4", "other"=>"disabled"])
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>
    /*let  all_client = document.querySelector("#all_clients");
    all_client.addEventListener("click", function(){

    });*/

</script>
@endsection