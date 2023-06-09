@extends('layouts.base', ["title" => "Récolte", "description" => "Liste des récolte."])
@section('content')
    <div class="block block-rounded">
        <div class="block-header">
            <div>
                <a href="" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i> Exporter
                </a>
            </div>
            <a href="{{ route('recolte.create') }}" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i> Ajout
            </a>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">Id</th>
                        <th class="d-none d-sm-table-cell text-center" >Client</th>
                        <th class="d-none d-sm-table-cell text-center" >Agent</th>
                        <th class="d-none d-sm-table-cell text-center" >Date</th>
                        <th class="d-none d-sm-table-cell text-center" >Montant</th>
                        <th style="width: 45%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recoltes as $recolte)
                    <tr>
                        <td class="text-center font-size-sm"> {{ "REC".$recolte->id }} </td>
                        <td class="text-center font-size-sm text-uppercase"> {{ $recolte->exercice->client }} </td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $recolte->agent }}</td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $recolte->date }}</td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $recolte->montant }}</td>
                        <td class="text-center"> 
                            <button type="submit" class="update-book btn btn-sm btn-success">
                                <a style="color: blanchedalmond;" href="">
                                    <span><i class="far fa-eye fa-lg"></i></span>
                            </button>   
                            <form action="{{ route("exercice.edit", $exercice) }}" method="GET">
                                @csrf
                                @method("GET")                                     
                                <button type="submit" class="update-book btn btn-sm btn-warning">
                                    <a style="color: blanchedalmond;" href="">
                                        <span><i class="far fa-edit fa-lg"></i></span>
                                </button>  
                            <form>
                            <form action="{{ route("exercice.destroy", $exercice) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="delete-evaluation btn btn-sm btn-danger" id="delete_instance">
                                    <a style="color: blanchedalmond;" href="">
                                        <span><i class="fa fa-fw fa-times mr-1"></i></span>
                                </button> 
                            </form>                                   
                        </td> 
                    </tr>
                    @empty
                        <div class="my-auto">
                            <h3 class="text-center">Aucune récolte.</h3>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop



