@extends('layouts.base')
@section('content')
<div class="content">
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Clients</div>
                    <div class="font-size-h2 font-w400 text-dark">{{ $nbreClients }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Tontines</div>
                    <div class="font-size-h2 font-w400 text-dark">{{ $nbreTontines }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Récoltes</div>
                    <div class="font-size-h2 font-w400 text-dark">{{ $montantRecoltes }} FCFA</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-sm font-w600 text-uppercase text-muted">Zones </div>
                    <div class="font-size-h2 font-w400 text-dark">{{ $nbreZones }}</div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Stats -->

    <div class="row text-center mt-3 mb-5">
        <div class="col-12 mx-auto">
            <form action="{{ route('generate.report') }}">
                <button type="submit" class="btn btn-dark p-4">GÉNÉRER LE RAPPORT DU JOUR</button>
            </form>
        </div>
    </div>

    <!-- Dashboard Charts -->
    <div class="row">
        <div class="col-12">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Gains</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content p-0 text-center">
                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard_v1.min.js which was auto compiled from _es6/pages/be_pages_dashboard_v1.js) -->
                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-earnings"></canvas></div>
                </div>
                <div class="block-content">
                    <div class="row items-push text-center py-3">
                        <div class="col-6 col-xl-4">
                            <i class="fa fa-wallet fa-2x text-muted"></i>
                            <div class="text-muted mt-3">148,000 FCFA</div>
                        </div>
                        <div class="col-6 col-xl-4">
                            <i class="fa fa-angle-double-up fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+9% Gains</div>
                        </div>
                        <div class="col-6 col-xl-4">
                            <i class="fa fa-users fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+46% Clients</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-6">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Sales</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content p-0 text-center">
                    <!-- Chart.js is initialized in js/pages/be_pages_dashboard_v1.min.js which was auto compiled from _es6/pages/be_pages_dashboard_v1.js) -->
                    <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                    <div class="pt-3" style="height: 360px;"><canvas class="js-chartjs-dashboard-sales"></canvas></div>
                </div>
                <div class="block-content">
                    <div class="row items-push text-center py-3">
                        <div class="col-6 col-xl-3">
                            <i class="fab fa-wordpress fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+20% Themes</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-font fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+25% Fonts</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-archive fa-2x text-muted"></i>
                            <div class="text-muted mt-3">-10% Icons</div>
                        </div>
                        <div class="col-6 col-xl-3">
                            <i class="fa fa-paint-brush fa-2x text-muted"></i>
                            <div class="text-muted mt-3">+8% Graphics</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- END Dashboard Charts -->

    <!-- Customers and Latest Orders -->
    <div class="row row-deck">
        <!-- Latest Customers -->
        <div class="col-lg-6">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Nouveau clients</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="font-w700" style="width: 80px;">ID</th>
                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Nom Complet</th>
                                <th class="font-w700">Contact</th>
                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 80px;">Profession</th>
                                <th class="font-w700 text-center" style="width: 60px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestUsers as $user)
                            <tr>
                                <td>
                                    <span class="font-w600">{{ $user->id }}</span>
                                </td>
                                <td class="font-w600">
                                    {{ $user->nom }} {{ $user->prenom }}                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    {{ $user->contact }}
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    {{ $user->profession }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('client.edit', $user) }}" data-toggle="tooltip" data-placement="left" title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Latest Customers -->

        <!-- Latest Orders -->
        <div class="col-lg-6">
            <div class="block block-rounded block-mode-loading-oneui">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Dernières récoltes</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-settings"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                        <thead>
                            <tr class="text-uppercase">
                                <th class="font-w700">ID</th>
                                <th class="d-none d-sm-table-cell font-w700">Client</th>
                                <th class="font-w700">Montant</th>
                                <th class="d-none d-sm-table-cell font-w700 text-right" style="width: 120px;">Date</th>
                                <th class="font-w700 text-center" style="width: 60px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestRecoltes as $recolte)
                            <tr>
                                <td>
                                    <span class="font-w600">{{ $recolte->id }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="font-size-sm text-muted">{{ $recolte->exercice_client->client->user->nom }} {{ $recolte->exercice_client->client->user->prenom }}</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-success">{{ $recolte->montant }}</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-right">
                                    {{ $recolte->date_recolte }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('recolte.edit', $recolte) }}" data-toggle="tooltip" data-placement="left" title="Manage">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Latest Orders -->
    </div>
    <!-- END Customers and Latest Orders -->

@stop
