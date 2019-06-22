@extends('layout.default')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3 class="card-title">Enregistrement</h3>
                <p class="card-category">Administrateurs
                    {{-- <a target="_blank" href="#">Robert McIntosh</a>. Please checkout the --}}
                    {{-- <a href="#" target="_blank">full documentation.</a> --}}
                </p>
            </div>
            <div class="card-body">
                <div class="row pt-5 pl-5">
                    <h4>
                        Village: {{$village->nom ?? 'Aucun village choisi'}}<br/>
                        Commune: {{$village->commune->nom ?? ''}}
                    </h4>
                </div>
                <div class="row pt-5"></div>
                
                <form method="POST" action="{{route('administrateurs.store')}}">
                    {{ csrf_field() }}
                    
                    <input type="hidden" name="village" value="{{$village->id??''}}" class="form-control" name="inputName" id="inputName" placeholder="">
                    
                    <div class="form-group">
                        <label for="input-matricule">Matricule</label>
                        <input type="text" name="matricule" class="form-control" id="input-matricule" aria-describedby="emailHelp" placeholder="entrez matricule">
                        <small id="input-matricule-help" class="form-text text-muted">
                            @if ($errors->has('matricule'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('matricule') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="input-nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="input-nom" aria-describedby="emailHelp" placeholder="Nom du client">
                        <small id="input-nom-help" class="form-text text-muted">
                            @if ($errors->has('nom'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('nom') as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputprenom">Prenom</label>
                        <input type="text" name="prenom" class="form-control" id="exampleInputprenom" aria-describedby="emailHelp" placeholder="Prenomdu client">
                        <small id="input-prenom-help" class="form-text text-muted">
                            @if ($errors->has('prenom'))
                            @foreach ($errors->get('prenom') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtelephone">Telephone </label>
                        <input type="telephone" name="telephone" class="form-control" id="exampleInputtelephone" aria-describedby="emailHelp" placeholder="Enter telephone">
                        <small id="input-telephone-help" class="form-text text-muted">
                            @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputemail">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputemail" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">
                            @if ($errors->has('email'))
                            @foreach ($errors->get('email') as $message)
                            <p class="text-danger">{{ $message }}</p>
                            @endforeach
                            @endif
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @if ($errors->has('password'))
                        @foreach ($errors->get('password') as $message)
                        <p class="text-danger">{{ $message }}</p>
                        @endforeach
                        @endif
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="">
                            Option one is this
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
                {{-- <div class="row justify-content-center">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div> --}}
                <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @push('scripts')
                                <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#error-modal").modal({
                                        'show':true,
                                    })
                                });
                                </script>
                                    
                                @endpush
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection