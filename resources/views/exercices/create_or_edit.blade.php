@extends('layouts.base', ["title" => $title ?? "Enregistrer un exercice", "description" => $description ?? ""])
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
                    @php 
                       $route = $exercice->id === null ? route("exercice.store") : route("exercice.update", $children);
                    @endphp
                    <form action="{{ $route }}" method="POST" onsubmit="">
                        @csrf
                        @if($exercice->id)
                            @method("put")
                        @endif
                        <div class="form-group form-row col-12">
                            @include("components.date_range_field", ["label" => "Interval de dates de l'exercice courant", "name" => "date_debut",  "name2" => "date_fin", "value" => $exercice->date_debut, "value2" => $exercice->date_fin,])
                        </div>
                        <div class="form-group form-row col-md-12">
                            <div class="form-group col-md-12">
                                <label for="">Client</label>
                                <div class="custom-control custom-switch mb-1">
                                    <input type="checkbox" class="custom-control-input" id="all_clients" name="all_clients" checked>
                                    <label class="custom-control-label" for="all_clients">Tous les clients</label>
                                </div>
                                <div>
                                    <select class="js-select2 form-control" id="clients" name="clients" style="width: 100%;" data-placeholder="Choose many.." multiple >
                                        <option value=""></option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->user->fullName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script>

    
        
         // Récupérer la référence vers la case à cocher cible
            let clientCheckBox = document.getElementById('all_clients');
            //

            // Récupérer la référence vers l'élément déclencheur
            let clientSelect = document.getElementById('clients');
            clientSelect.disabled = true;


            // Ajouter un gestionnaire d'événement pour écouter les changements d'état
            clientCheckBox.addEventListener('click', function() {
                console.log('hello');
                // Vérifier si l'élément déclencheur est coché ou non
                
                if (this.checked) {
                        // Activer la case à cocher cible
                        clientSelect.disabled = true;
                } else {
                        // Désactiver la case à cocher cible
                        clientSelect.disabled = false;
                }
            });
            
                
       


</script>
@endsection