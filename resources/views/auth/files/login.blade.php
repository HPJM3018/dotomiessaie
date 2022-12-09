@extends('auth.template')

@section('title','Connexion')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
            <img src="{{asset('image/images/african-doctor.jpg')}}" class="img-fluid" alt="" srcset="">
        </div>
        <div class="col-md-6">
            @if (Session::get('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Message</strong> {{ Session::get('danger')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class=" container mt-5 mb-5 p-3">
                <h1 class="text-intimate py-4"> <a href="{{route('user.home')}}" class="btn btn-lg" style="background:#8D3894;border-radius:30px"> <i class="fa fa-arrow-left"></i> </a>  Connectez-vous </h1>
                <form action="{{route('auth.check')}}" method ="POST" style="width:80%">
                    @csrf
                    <div class="row mb-3" style="background:#8D3894; padding: 30px;border-radius:30px;; color:white">
                        <div class="col-12 mb-3">
                            <label for="input">Pseudo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" style="opacity:0.5" value="{{@old('pseudo')}}" id="input" name="pseudo">
                                <span class="text-danger">@error('pseudo'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="inputPassword3" >Mot de Passe</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" style="opacity:0.5" id="inputPassword3" name="password" placeholder="Mot de passe">
                                <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                            </div>
                        </div>
                    </div>
                        <br>

                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn bg-intimate text-white btn-lg" type="submit" id="btninscription" >Se connecter</button>
                    </div><br>

                    <p>Pas encore de compte. <a href="{{route('register')}}">S'inscrire</a></p>
            
                </form>
            </div>
        </div> 
    </div>
</div>


@endsection