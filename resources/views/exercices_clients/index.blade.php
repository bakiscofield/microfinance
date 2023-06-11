@extends('layouts.base', ["title" => "Tontine client", "description" => "Liste des tontines par client."])
@section('content')
    <div class="block block-rounded">
        <div class="block-header">
            <div>
                <a href="" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i> Exporter
                </a>
            </div>
            <a href="{{ route('exercices_clients.create') }}" class="btn btn-outline-primary">
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
                        <th class="d-none d-sm-table-cell text-center" >Montant Journalier</th>
                        <th class="d-none d-sm-table-cell text-center" >jour de récolte</th>
                        <th style="width: 45%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($exercices_clients as $exercice_client)
                    <tr>
                        <td class="text-center font-size-sm"> {{ "TONT".$exercice_client->id }} </td>
                        <td class="text-center font-size-sm text-uppercase"> {{ $exercice_client->client->user->fullName }} </td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $exercice_client->employe }}</td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $exercice_client->created_at }}</td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $exercice_client->montant_journalier }}</td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $exercice_client->jour_recolte }}</td>
                        <td class="text-center d-flex"> 
                            <!--button type="submit" class="update-book btn btn-sm btn-success">
                                <a style="color: blanchedalmond;" href="">
                                    <span><i class="far fa-eye fa-lg"></i></span>
                            </button-->  
                            <form action="{{ route('recolte_client.create', $exercice_client) }}" method="GET">
                                @csrf                                 
                                <button type="submit" class="update-book btn btn-sm" style="background: rgb(6, 169, 250);">
                                    <a style="color: blanchedalmond;" href="">
                                        <span><i class="far fa-edit fa-lg"></i></span>
                                </button>  
                            <form> 
                            <form action="" method="GET">
                                @csrf
                                @method("GET")                                     
                                <button type="submit" class="update-book btn btn-sm btn-warning">
                                    <a style="color: blanchedalmond;" href="">
                                        <span><i class="far fa-edit fa-lg"></i></span>
                                </button>  
                            <form>
                            <form action="" method="post">
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



