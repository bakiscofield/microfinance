@extends('layouts.base', ["title" => $title ?? "Enregistrer une récolte", "description" => $description ?? ""])
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="text-uppercase">Récolte du moi de {{trans(strtolower($mounth)) ?? " "}} </h4>
            <h4 class="text-uppercase">Date : {{ $to_day }} </h4>
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
                        <div class="form-row col-md-12">
                            {{-- <div class="col-md-2 mt-4">
                                <div class="custom-control custom-switch custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="edit_recolt_iformation" name="edit_recolt_iformation" checked>
                                    <label class="custom-control-label" for="edit_recolt_iformation">Modifier</label>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <label for="client">Client</label>
                                <select name="id_client" id="client" class="form-control mb-4">
                                    <option value="">Séléctionner un client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->user->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-4">
                                <label for="jour">Jour de cotisation</label>
                                <select name="jour" id="jour" class="form-control mb-4">
                                    <option value="">Séléctionner un jour</option>
                                    @foreach($jours as $jour)
                                    <option value="{{ $loop->index }}">{{ $jour }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                        {{-- @include("components.input_field", ["label" => "Montant journalier", "name" => "montant_journalier", "value" => "", "type" => "number", "class" => "col-md-12 mb-4 montant_journalier"]) --}}
                        <div class="mb-4 form-row col-md-12">
                            @include("components.input_field", ["label" => "Montant cotisé", "name" => "montant", "value" => "", "type" => "number", "class" => "col-md-12 montant"])
                            {{--@include("components.input_field", ["label" => "Jours restant", "name" => "jour", "value" => "", "type" => "number", "class" => "col-md-4 jour", "other"=>"disabled"])--}}
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">Enregistrer et recommencer</button>
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
    let client_tag = document.querySelector("#client");
    console.log(client_tag);
    client_tag.addEventListener("change", function(){
        let client_id = this.value;
        //alert(client_id);
        $.ajax({
                type: "GET",
                url: "/client/current_tontine_info/"+client_id,
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response){
                    response = JSON.parse(response);
                    //console.log(response);
                    let  jour_tag = document.querySelector("#jour");
                    jour_tag.value = response["jour_cotisation"];
                    let  montant_journalier_tag = document.querySelector(".montant_journalier").children[1];
                    montant_journalier_tag.value = response["montant_journalier"];
                    let  jour_restant_tag = document.querySelector(".jour").children[1];
                    jour_restant_tag.value = response["jour_restant"];
                },
                error: function(xhr, textStatus, errorThrown){
                  alert("Erreur");
                }
            });
    });
</script>
@endsection