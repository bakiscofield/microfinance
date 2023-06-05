@extends('layouts.base', ["title" => "Employe", "description" => "Liste des employés."])
@section('content')
    <div class="block block-rounded">
        <div class="block-header">
            <div>
                <a href="" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i> Exporter
                </a>
            </div>
            <a href="{{ route('employe.create') }}" class="btn btn-outline-primary">
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
                        <th class="d-none d-sm-table-cell text-center" >Numero</th>
                        <th class="d-none d-sm-table-cell text-center" >Status</th>
                        <th style="width: 15%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employes as $employe)
                    <tr>
                        <td class="text-center font-size-sm"> {{ "EPL".$employe->id }} </td>
                        <td class="text-center font-size-sm text-uppercase"> {{ $employe->user->nom }} </td>
                        <td class="d-none d-sm-table-cell text-center text-capitalize">{{ $employe->user->prenom }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $employe->user->contact }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $employe->user->pays }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $employe->user->ville }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $employe->numero }}</td>
                        <td class="text-center d-none d-sm-table-cell font-size-sm">{{ $employe->status }}</td>
                        <td class="text-center"> 
                            <button type="button" class="update-book btn btn-sm btn-success">
                                <a style="color: blanchedalmond;" href="{% url 'main:edit_evaluation' evaluation.id %}">
                                    <span><i class="far fa-eye fa-lg"></i></span>
                            </button>                                        
                            <button type="button" class="update-book btn btn-sm btn-warning">
                                <a style="color: blanchedalmond;" href="{{route('employe.edit',$employe)}}">
                                    <span><i class="far fa-edit fa-lg"></i></span>
                                </a>    
                            </button>  
                            <button type="button" class="delete-evaluation btn btn-sm btn-danger">
                                <a style="color: blanchedalmond;" href="{% url 'main:delete_evaluation' evaluation.id %}">
                                    <span><i class="fa fa-fw fa-times mr-1"></i></span>
                            </button>                                    
                        </td> 
                    </tr>
                    @empty
                        <div class="my-auto">
                            <h3 class="text-center">Aucun employe.</h3>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
      
    </div>
@stop



