@extends('layouts.base', ["title" => "Liste des clients", "description" => ""])
@section('content')
    <div class="block block-rounded">
        <div class="block-header">
            <div>
                <a href="" class="btn btn-outline-primary">
                    <i class="fa fa-2x fa-file-export"></i> Exporter
                </a>
            </div>
            <a href="{{ route('client.create') }}" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i> Ajout
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
                    @forelse ($clients as $client)
                    <tr>
                        <td class="text-center font-size-sm"> {{ "CL".$client->id }} </td>
                        <td class="text-center font-size-sm text-uppercase"> {{ $client->user->nom }} </td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $client->user->prenom }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $client->user->contact }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $client->user->pays }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $client->user->ville }}</td>
                        <td class="text-center"> 
                            <form action="{{ route('client.show', $client) }}" method="GET">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <span><i class="far fa-eye fa-lg"></i></span>                                
                                </button> 
                            </form>      
                            <form action="{{ route('client.edit', $client) }}" method="GET">
                                <button type="submit" class="btn btn-sm btn-warning">
                                    <span><i class="far fa-edit fa-lg"></i></span>
                                </button> 
                            </form>                                      
                            <form action="{{ route('client.destroy', $client) }}" method="POST">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-sm btn-danger">
                                        <span><i class="fa fa-fw fa-times mr-1"></i></span>
                                </button> 
                            </form>                                 
                        </td> 
                    </tr>
                    @empty
                        <div class="my-auto">
                            <h3 class="text-center">Aucun client.</h3>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop



