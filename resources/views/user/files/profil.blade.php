@extends('user.template')

@section('title', 'Profil')

@section('profil', 'active')

@section('style')

<link rel="stylesheet" href="{{asset('intlTelInput/css/intlTelInput.css')}}">

<style>
    .con{
	font-family: sans-serif;
}


.hidden, #uploadImg:not(.hidden) + label{
	display: none;
}

#file{
	display: none;
  	margin: 0 auto;
}

#upload{
	display: block;
	padding: 10px 25px;
	border: 0;
	margin: 0 auto;
	font-size: 15px;
	letter-spacing: 0.05em;
	cursor: pointer;
	background: #216e69;
	color: #fff;
	outline: none;
	transition: .3s ease-in-out;
	&:hover, &:focus{
		background: #1AA39A;
	}
	&:active{
		background: #13D4C8;
		transition: .1s ease-in-out;
	}
}

img{
	display: block;
	margin: 0 auto 15px;
}
</style>

@endsection

@section('content')

	<!-- Slider -->
	<section class="section" style="height:150px">
	    <div class="container h-100">
	    	<div class="row h-100">
                <div class="col-md-12 h-100 d-flex flex-column justify-content-center text-center">
                    <h1 class="text-white h1"> Mon profil</h1>
                </div>
            </div>
	    </div>
   </section>
   <!-- Consultation VIP -->
   <section class="" style="background:whitesmoke"><br><br>

   <div class="row">
            <div class="col-1"> </div>
            <div class="col-10">
                <h2 style="color:#8D3894; text-align:center">Image de profil</h2><br>
                <div class="">
                <form method="post" action="{{route('user.image',auth()->user()->id)}}" enctype="multipart/form-data"> 
                    @csrf
                    @method('put')
                    <div class="con">
                        <span class="label" for="input"  > 
                            @if(auth()->user()->image)
                            <img src="{{asset('uploads/image/'.auth()->user()->image.'')}}" style="margin:auto;width:200px" alt=""> 
                            @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRND9PGLifhRU0JEEGIQMh6zOp_nQVvNqGzDZBxRYU4c6rJp0YRATKbJDKQuL_BwA11u4c&usqp=CAU" style="margin:auto;" alt=""> 
                            @endif
                        </span>
                        <div class="input">
                            <input id="file" name="image" type="file">
                        </div><br>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn bg-intimate text-white btn-lg" type="submit" id="btninscription" >Valider</button>
                        </div><br>
                    </div>
                </form>
            </div>
            </div>
            <div class="col-1"> </div>
        </div>
        <hr>
   		<div class="row">
            <div class="col-1"> </div>
            <div class="col-10">
                <h2 style="color:#8D3894; text-align:center">Mes informations personnelles</h2><br>
                <div class="container">
                    <form  id="formphone" action="{{route('user.update_info',auth()->user()->id)}}" method ="POST">
                        @csrf
                        @method('put')
                        <div class="row mb-3" style="background:white; padding: 30px;border-radius:30px">
                            @if(auth()->user()->role != 'user')
                            <div class="col-6 mb-3">
                                <label for="inputEmail3">Nom Complet</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="{{auth()->user()->name}}" style="opacity:0.5" id="inputEmail3" name="name" placeholder="Nom Complet">
                                    <span class="text-danger">@error('name'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="inputEmail3">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" style="opacity:0.5" value="{{auth()->user()->email}}" id="inputEmail3" name="email" placeholder="Email">
                                    <span class="text-danger">@error('email'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            @endif
                            <div class="col-6 mb-3">
                                <label for="inputEmail3">Pseudo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" style="opacity:0.5" value="{{auth()->user()->pseudo}}" id="inputEmail3" name="pseudo" placeholder="Pseudo">
                                    <span class="text-danger">@error('pseudo'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            <div class="col-6 mb-3" id="phone_div">
                                <label for="inputEmail3">Telephone</label>
                                <div class="col-sm-12" style="color:black">
                                    <input type="text" id="phone" class="form-control  @error('phone') is-invalid @enderror" style="opacity:0.5" value="{{auth()->user()->phone}}" name="phone" onkeypress="verifierCaracteres(event); return false;" >
                                    <span class="text-danger">@error('phone'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="inputEmail3">Ville</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" style="opacity:0.5" value="{{auth()->user()->city}}" id="inputEmail3" name="city" placeholder="Ville">
                                    <span class="text-danger">@error('city'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="inputEmail3">Profession</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" style="opacity:0.5" value="{{auth()->user()->work}}" id="inputEmail3" name="work" placeholder="Profession">
                                    <span class="text-danger">@error('work'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="inputEmail3">Date de Naissance</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" style="opacity:0.5" value="{{auth()->user()->birth}}" id="inputEmail3" name="birth" placeholder="Date de Naissance">
                                    <span class="text-danger">@error('birth'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="inputPassword3">Sexe</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="sex" style="opacity:0.5">
                                        <option value=""> Sexe</option>
                                        <option value="Féminin">Féminin</option>
                                        <option value="Masculin">Masculin</option>
                                    </select>
                                    <span class="text-danger">@error('sex'){{ $message }} @enderror </span>
                                </div>
                            </div>
                        </div><br>

                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn bg-intimate text-white btn-lg" type="submit" id="btninscription" >Modifier mes informatidons</button>
                        </div><br>
                    </form>
                </div>
            </div>
            <div class="col-1"> </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-1"> </div>
            <div class="col-10">
                <h2 style="color:#8D3894; text-align:center">Changer mot de passe</h2><br>
                <div class="container">
                    <form  id="formphone" action="{{route('user.update_pass',auth()->user()->id)}}" method ="POST">
                        @csrf
                        @method('put')
                        <div class="row mb-3" style="background:white; padding: 30px;border-radius:30px">
                            
                            <div class="col-12 mb-3">
                                <label for="inputPassword3" >Ancien Mot de Passe</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" style="opacity:0.5" id="inputPassword3" name="older" placeholder="Ancien Mot de Passe">
                                    <span class="text-danger">@error('older'){{ $message }} @enderror </span>
                                </div>
                            </div>    
                            <div class="col-6 mb-3">
                                <label for="inputPassword3" >Nouveau Mot de Passe</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" style="opacity:0.5" id="inputPassword3" name="password" placeholder="Nouveau Mot de Passe">
                                    <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            
                            <div class="col-6 mb-3">
                                <label for="inputPassword3" >Confirmer Mot de Passe</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" style="opacity:0.5" id="inputPassword3" name="confirm" placeholder="Confirmer Mot de Passe">
                                    <span class="text-danger">@error('confirm'){{ $message }} @enderror </span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn bg-intimate text-white btn-lg" type="submit" id="btninscription" >Valider</button>
                        </div><br>
                    </form>
                </div>
            </div>
            <div class="col-1"> </div>
        </div>
   </section>
@endsection

@section('script')

    <script src="{{asset('intlTelInput/js/intlTelInput.min.js')}}"></script>
    <script src="{{asset('js/phone.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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

    <script>
        $(function(){
        var container = $('.con'), inputFile = $('#file'), img, btn, txt = 'Selectionner', txtAfter = 'Changer';
                
        if(!container.find('#upload').length){
            container.find('.input').append('<input type="button" value="'+txt+'" id="upload">');
            btn = $('#upload');
            container.prepend('<img src="" class="hidden" alt="Uploaded file" id="uploadImg" width="200">');
            img = $('#uploadImg');
        }
                
        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });

        inputFile.on('change', function(e){
            container.find('span').html( inputFile.val() );
            
            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                    reader = new FileReader();

                reader.onloadend = function(){
                    img.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                img.removeClass('hidden');
            }
            
            btn.val( txtAfter );
        });
    });
    </script>

@endsection