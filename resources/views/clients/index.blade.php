@extends('layouts.base', ["title" => "Client", "description" => "Liste des clients."])
@section('content')
    @forelse ($clients as $client)
    <div class="block block-rounded">
        <div class="block-header">
            <div>
                <a href="" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i> Exporter
                </a>
            </div>
            <a href="" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i> Ajout evaluation
            </a>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">Id</th>
                        <th class="d-none d-sm-table-cell text-center" >Nom</th>
                        <th class="d-none d-sm-table-cell text-center" >Prénom</th>
                        <th class="d-none d-sm-table-cell text-center" style="width: 30%;">Contact</th>
                        <th class="d-none d-sm-table-cell text-center" >Pays</th>
                        <th class="d-none d-sm-table-cell text-center" >Ville</th>
                        <th style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center font-size-sm"> {{ "CL".$client->id }} </td>
                        <td class="text-center font-size-sm text-uppercase"> {{ $client->user->nom }} </td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $client->user->prenom }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $client->user->contact }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $client->user->pays }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $client->user->ville }}</td>
                        <td class="text-center">                                       
                            <button type="button" class="update-book btn btn-sm btn-warning">
                                <a style="color: blanchedalmond;" href="{% url 'main:edit_evaluation' evaluation.id %}">
                                    <span><i class="far fa-edit fa-lg"></i></span>
                            </button>  
                            <button type="button" class="delete-evaluation btn btn-sm btn-danger">
                                <a style="color: blanchedalmond;" href="{% url 'main:delete_evaluation' evaluation.id %}">
                                    <span><i class="fa fa-fw fa-times mr-1"></i></span>
                            </button>                                    
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @empty
        <div class="my-auto">
            <h3 class="text-center">Aucun client.</h3>
        </div>
    @endforelse

@stop



