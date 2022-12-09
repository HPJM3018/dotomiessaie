@extends('auth.template')
@section('title','Inscription')
@section('style')


<link rel="stylesheet" href="{{asset('intlTelInput/css/intlTelInput.css')}}">

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 d-flex flex-column align-items-center">
            <img src="{{asset('image/images/african-doctor.jpg')}}" class="img-fluid" alt="" srcset="">
        </div>
        <div class="col-md-6">
            
            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Message</strong> {{ Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class=" container">
                <h1 class="text-intimate py-4"> <a href="{{route('user.home')}}" class="btn btn-lg" style="background:#8D3894;border-radius:30px"> <i class="fa fa-arrow-left"></i> </a> Inscrivez vous </h1>
                <form  id="formphone" action="{{route('auth.save')}}" method ="POST">
                    @csrf
                    <div class="row mb-3" style="background:#8D3894; padding: 30px;border-radius:30px; color:white">
                        {{--<div class="col-6 mb-3">
                            <label for="inputEmail3">Nom Complet</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{@old('name')}}" style="opacity:0.5" id="inputEmail3" name="name" placeholder="Nom Complet">
                                <span class="text-danger">@error('name'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" style="opacity:0.5" value="{{@old('email')}}" id="inputEmail3" name="email" placeholder="Email">
                                <span class="text-danger">@error('email'){{ $message }} @enderror </span>
                            </div>
                        </div>--}}
                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Pseudo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" style="opacity:0.5" value="{{@old('pseudo')}}" id="inputEmail3" name="pseudo" placeholder="Pseudo">
                                <span class="text-danger">@error('pseudo'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3" id="phone_div">
                            <label for="inputEmail3">Telephone</label>
                            <div class="col-sm-12" style="color:black">
                                <input type="text" id="phone" class="form-control  @error('phone') is-invalid @enderror" style="opacity:0.5" value="{{@old('phone')}}" name="phone" onkeypress="verifierCaracteres(event); return false;" >
                                <span class="text-danger">@error('phone'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Ville</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" style="opacity:0.5" value="{{@old('city')}}" id="inputEmail3" name="city" placeholder="Ville">
                                <span class="text-danger">@error('city'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Profession</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" style="opacity:0.5" value="{{@old('work')}}" id="inputEmail3" name="work" placeholder="work">
                                <span class="text-danger">@error('work'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Date de Naissance</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" style="opacity:0.5" value="{{@old('birth')}}" id="inputEmail3" name="birth" placeholder="Date de Naissance">
                                <span class="text-danger">@error('birth'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="inputPassword3">Sexe</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="sex" style="opacity:0.5" value="{{@old('sex')}}">
                                    <option value=""> Sexe</option>
                                    <option value="Féminin">Féminin</option>
                                    <option value="Masculin">Masculin</option>
                                </select>
                                <span class="text-danger">@error('sex'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="inputPassword3" >Mot de Passe</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" style="opacity:0.5" id="inputPassword3" name="password">
                                <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        
                        <div class="col-6 mb-3">
                            <label for="inputPassword3" >Confirmer</label>
                            <div class="col-sm-12">
                                <input type="password" class="form-control" style="opacity:0.5" id="inputPassword3" name="confirm">
                                <span class="text-danger">@error('confirm'){{ $message }} @enderror </span>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid col -6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                J'accepte les conditions générales d'utilisation <a href="">CGU</a>
                            </label>
                        </div>
                    </div><br>

                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn bg-intimate text-white btn-lg" type="submit" id="btninscription" >S'inscrire</button>
                    </div><br>

                    <p>J'ai déjà un compte. <a href="{{route('login')}}">Se connecter</a></p>
            
                </form>
            </div>
        </div> 
    </div>
</div>

@endsection

@section('script')

<script src="{{asset('intlTelInput/js/intlTelInput.min.js')}}"></script>
 <script src="{{asset('js/phone.js')}}"></script>

<script>

  function verifierCaracteres(event) {
        
    var keyCode = event.which ? event.which : event.keyCode;
    var touche = String.fromCharCode(keyCode);
        
    var champ = document.getElementById('phone');
        
    var caracteres = '+0123456789';
        
    if(caracteres.indexOf(touche) >= 0) {
      champ.value += touche;
    }
        
  }

</script>
@endsection