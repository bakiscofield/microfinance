@extends('layouts.users.create_or_edit', ["title" => "Client", "description" => "Forumulaire d'enregistrement", "route_name_prefix" => "client", "children" => $client])
@section('children_content1')
<div class="form-row col-md-12">
    <!--div class="col-md-2 mt-4">
        <div class="custom-control custom-switch custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="edit_recolt_iformation" name="edit_recolt_iformation" checked>
            <label class="custom-control-label" for="edit_recolt_iformation">Modifier</label>
        </div>
    </div-->
    {{-- <div class="col-md-4">
        <label for="jour">Jour de cotisation</label>
        <select name="jour" id="jour" class="form-control mb-4">
            <option value="">Séléctionner un jour</option>
            @foreach($jours as $jour)
            <option value="{{ $loop->index }}">{{ $jour }}</option>
            @endforeach
        </select>
    </div>
    @include("components.input_field", ["label" => "Montant journalier", "name" => "montant_journalier", "value" => "", "type" => "number", "class" => "col-md-8 mb-4 montant_journalier"]) --}}
</div>
@endsection