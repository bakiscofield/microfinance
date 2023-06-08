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
                        <div class="input-daterange input-group form-row mb-4" data-date-format="mm/dd/yyyy" data-week-start="1" data-autoclose="true" data-today-highlight="true">
                            @include("components.date_field", ["label" => "date début", "name" => "date_debut", "value" => $exercice->date_debut,])
                            <div class="input-group-prepend input-group-append mt-4 col-2">
                                <span class="input-group-text font-w600">
                                    <i class="fa fa-fw fa-arrow-right"></i>
                                </span>
                            </div>
                            @include("components.date_field", ["label" => "date fin", "name" => "date_fin", "value" => $exercice->date_fin,])
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="">Client</label>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    <div class="form-group">
                                        <select class="js-select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                            <option value=""></option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->user->fullName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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