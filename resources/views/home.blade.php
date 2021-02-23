@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

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

                    <div class="container-fluid w-100 justify-content-between">

                        <h4>Roulette</h4>

                    </div>

                    <hr class="my-4">

                    <div class="container-fluid w-100 justify-content-between">

                        <h4>Proposer un sujet</h4>

                        <form action="{{ route('sendNewSubject') }}" method="POST" class="justify-content-start">
                            @csrf

                            <div class="form-group row">
                                <label for="subject" class="col-lg-3 col-md-4 my-1 col-form-label text-left">Sujet à proposer</label>

                                <div class="col-lg-5 col-md-8 my-1">
                                    <input id="subject" type="text" class="form-control d-block w-100" name="subject" placeholder="Exemple : Deux familles se croisent au concours de barbecue de Dunkerque" required autofocus>
                                    <input id="user_id" type="hidden" class="form-control d-block w-100" name="user_id" value="{{ Auth::User()->id }}">
                                </div>

                                <div class="col-lg-4 col-md-12 my-1">
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Sujets</div>
                <div class="card-body">

                <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Sujet</th>
      <th scope="col">Par</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($subjects as $subject)
    <tr>
      <th scope="row">{{ $subject->id }}</th>
      <td>{{ $subject->content }}</td>
      <td>{{ $subject->user_id }}</td>
      <td>{{ $subject->id }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection