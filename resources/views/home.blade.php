@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::User()->allow === 0)
    <div class="alert alert-danger" role="alert">
        Attention!
        Votre compte n'a pas été autorisé par le président du club.
        Veuillez contacter ce dernier à fin d'accéder aux fonctionnalités de membres.
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('logout-form').submit();
        }, 2500);
    </script>

    <form name="logout-form" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @else
    <script>
        setTimeout(function() {
            document.getElementById('connection-success').style.display = "none";
        }, 2500);
    </script>
    @if(isset($alert))
    <div class="alert alert-success" role="alert" id="connection-success">
        {{ $alert }}
    </div>
    @endif
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card mb-3 border-top-0">


                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Sujet</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->content }}</td>
                            <td>{{ $subject->first_name }} {{ $subject->last_name }}</td>
                            <td>
                                @if($subject->status === 0)
                                Sans traiter
                                @else
                                Traité
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Roulette</div>
                <script>
                    document.getElementById('go-back-button').style.display = "none";
                </script>
                <div class="card-body">

                    <div class="container-fluid w-100 justify-content-between m-0 p-0">

                        @if(isset($random))
                        <script>
                            setTimeout(function() {
                                document.getElementById('loading-gif').style.display = "none";
                                document.getElementById('go-back-button').style.display = "block";
                            }, 5000);
                        </script>
                        <img src="{{ asset('img/tirage.gif') }}" class="img-fluid" alt="Loading animation" id="loading-gif">
                        <div class="col-12 my-1" id="go-back-button" style="display: none !important;">
                            @foreach($random as $subject)
                            <div class="alert alert-info" role="alert">
                                <h4 class="alert-heading">Sujet</h4>
                                <p>{{ $subject->content }}</p>
                                <hr>
                                <p class="mb-0"><i>~ {{ $subject->first_name }} {{ $subject->last_name }}</i></p>
                            </div>
                            @endforeach
                            <a href="{{ route('home') }}" role="button" class="btn btn-primary d-block w-100">
                                Revenir en arrière
                            </a>
                        </div>

                        @else
                        <form action="{{ route('randomSubject') }}" method="POST" class="justify-content-start">
                            @csrf
                            <div class="col-12 my-1">
                                <button type="submit" class="btn btn-primary d-block w-100">
                                    Tirer un sujet au sort
                                </button>
                            </div>
                        </form>
                        @endif

                    </div>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-header">Proposer un sujet</div>

                <div class="card-body">

                    <div class="container-fluid w-100 justify-content-between">

                        <form action="{{ route('proposeSubject') }}" method="POST" class="justify-content-start">
                            @csrf

                            <div class="form-group row">
                                <label for="subject" class="col-12 my-1 col-form-label text-left">Sujet à proposer</label>

                                <div class="col-12 my-1">
                                    <input id="subject" type="text" class="form-control d-block w-100" name="subject" placeholder="Exemple : Deux familles se croisent au concours de barbecue de Dunkerque" required autofocus>
                                    <input id="user_id" type="hidden" class="form-control d-block w-100" name="user_id" value="{{ Auth::User()->id }}">
                                </div>

                                <div class="col-12 my-1">
                                    <button type="submit" class="btn btn-primary d-block w-100">
                                        Envoyer
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>

                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection