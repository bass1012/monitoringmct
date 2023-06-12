@extends('layouts.app')

@section('content')

    <!-- Affichage des messages de succès ou d'erreur -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row container-body">
        <div class="col-md-3">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <h2 class="mb-4">État des services</h2>
                    <table class="table">
                        <tbody>
                            @foreach ($serviceStatuses as $status)
                                <tr>
                                    <td class="service-status clickable">
                                        @if ($status['status'] == 'OK')
                                            <span class="status-badge status-ok"></span>
                                        @elseif ($status['status'] == 'Maintenance')
                                            <span class="status-badge status-maintenance"></span>
                                        @elseif ($status['status'] == 'Perturbation')
                                            <span class="status-badge status-perturbation"></span>
                                        @elseif ($status['status'] == 'Incident')
                                            <span class="status-badge status-incident"></span>
                                        @endif
                                    </td>                                    
                                    <td class="service-name">{{ $status['name'] }}</td>
                                    <td class="service-description hidden">{{ $status['description'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm rounded">
                <div class="card-body" id="selected-service">
                    <h2 class="mb-4">Détails du service</h2>
                    <p>Sélectionnez un service pour afficher les détails.</p>
                    <div class="selected-service-details">
                        <span class="status-badge"></span>
                        <p id="selected-service-name"></p>
                        <p id="selected-service-description" style="text-align:justify;"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm rounded">
                <div class="card-body">
                    <h2 class="mb-4">Légende des statuts</h2>
                    <ul class="legend-list">
                        <li><span class="status-badge status-ok legend-cell"></span>Bon fonctionnement</li>
                        <li><span class="status-badge status-maintenance legend-cell"></span>En cours de maintenance</li>
                        <li><span class="status-badge status-perturbation legend-cell"></span>Anomalie</li>
                        <li><span class="status-badge status-incident legend-cell"></span>Incident</li>
                    </ul>
                </div>
            </div>
        </div>        
         
    </div>
    
       
@endsection
