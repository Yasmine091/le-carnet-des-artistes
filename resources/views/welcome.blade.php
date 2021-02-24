@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">Présentation</div>
                <div class="card-body">
                    <div class="container-fluid w-100 justify-content-between m-0 p-0">

                        <p>
                            Le théâtre est une fête et un travail !<br>
                            Cet art joyeux et populaire renforce la capacité de chacun à trouver sa liberté face aux contraintes.<br>
                            Les Ateliers Théâtre des Bords de Scènes proposent, aux débutants comme aux amateurs expérimentés,
                            de faire partie d’un groupe de comédiens.<br>
                            Accompagnés et dirigés par des comédiens – metteurs en scènes
                            professionnels, chaque atelier participe à la création d’un spectacle.</p>

                        <p>
                            Le premier trimestre est consacré à la découverte des qualités de l’acteur : confiance, lâcher-prise,
                            écoute de soi, créativité, improvisation.<br>
                            La suite de l’année est dédiée à l’élaboration progressive
                            du spectacle, sur un thème commun à tous les ateliers.<br>
                            Le travail trouvant son aboutissement lors de
                            deux représentations publiques au mois de juin au Théâtre Jean Dasté, Juvisy-sur-Orge.
                        <p>

                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">Adhérents</div>
                <div class="card-body p-1 pt-3">
                    <div class="container-fluid w-100 justify-content-between">

                    <div class="card-columns">
                    @foreach ($adherents as $adherent)
                        <div class="card bg-primary text-dark">
                            <div class="card-body p-2">
                                <h5 class="card-title m-0 font-weight-bolder text-light">{{ $adherent->first_name }} {{ $adherent->last_name }}</h5>
                            </div>
                            <ul class="list-group list-group-flush bg-info">
                                    <li class="list-group-item bg-info p-2"><b>Tél :</b> {{ $adherent->number }}</li>
                                    <li class="list-group-item bg-info p-2"><b>Mail :</b> {{ $adherent->email }}</li>
                            </ul>
                        </div>
                    @endforeach
                    </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card border-top-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Lieu</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->place }}</td>
                            <td>{{ $event->date }}</td>
                            <td>
                                @if($event->status === 0)
                                À venir
                                @else
                                Réalisé
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection