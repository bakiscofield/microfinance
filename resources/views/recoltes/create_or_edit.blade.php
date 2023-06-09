@extends('layouts.base', ["title" => $title ?? "Enregistrer une récolte", "description" => $description ?? ""])
@section('content')
<div class="content">
    <div class="block block-rounded">
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
                            <label for="client">Client</label>
                            <select name="client" id="client" class="form-control mb-4">
                                <option value="">Séléctionner un client</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->user->fullName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @include("components.input_field", ["label" => "Montant cotisé", "name" => "montant", "value" => "", "type" => "number", "class" => "col-md-12 mb-4"])
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
    /*let  all_client = document.querySelector("#all_clients");
    all_client.addEventListener("click", function(){

    });*/

</script>
@endsection