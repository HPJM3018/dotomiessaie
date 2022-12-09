@extends('admin/template_admin')

@section('title','Mon profil')

@section('dashboard','active')

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

@section('body')
<div class="main-content-inner">
    <div class="row">
    <div class="col-12"><br>
            <h3 class="header-title text-center">Image de profil</h3>
            <div class="">
                <form method="post" action="{{route('admin.image',auth()->user()->id)}}" enctype="multipart/form-data"> 
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
                            <button class="btn btn-template btn-lg" type="submit" id="btninscription" >Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 mt-5">
            <h3 class="header-title text-center">Information personnelle</h3>
            <div class="card"  style="padding:10px">
                <form  id="formphone" action="{{route('admin.update1',auth()->user()->id)}}" method ="POST">
                    @csrf
                    @method('put')@method('put')
                    <div class="results">
                        @if (Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::get('danger'))
                            <div class="alert alert-danger">
                                {{ Session::get('danger')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="row mb-3 card-body">
                        <div class="col-12 mb-3">
                            <label for="inputEmail3">Nom Complet</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="{{auth()->user()->name}}"  id="inputEmail3" name="name" placeholder="Nom Complet">
                                <span class="text-danger">@error('name'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control"  value="{{auth()->user()->email}}" id="inputEmail3" name="email" placeholder="Email">
                                <span class="text-danger">@error('email'){{ $message }} @enderror </span>
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Pseudo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control"  value="{{auth()->user()->pseudo}}" id="inputEmail3" name="pseudo" placeholder="Pseudo">
                                <span class="text-danger">@error('pseudo'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        <div class="col-6 mb-3" id="phone_div">
                            <label for="inputEmail3">Telephone</label>
                            <div class="col-sm-12" style="color:black">
                                <input type="text" id="phone" class="form-control  @error('phone') is-invalid @enderror"  value="{{auth()->user()->phone}}" name="phone" onkeypress="verifierCaracteres(event); return false;" >
                                <span class="text-danger">@error('phone'){{ $message }} @enderror </span>
                            </div>
                        </div>
                        
                        
                        <div class="col-6 mb-3">
                            <label for="inputEmail3">Profession</label>
                            <div class="" id="s1">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="{{auth()->user()->work}}" id="inputEmail3" name="work" placeholder="Profession">
                                    <span class="text-danger">@error('work'){{ $message }} @enderror </span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-template btn-lg" type="submit" id="btninscription" >Sauvegarder</button>
                    </div><br>
        
                </form>
            </div>
        </div>
        <div class="col-12 mt-5">
            <h3 class="header-title text-center">Mot de passe</h3>
            <div class="card"  style="padding:10px">
                <form method="post" action="{{route('admin.update2',auth()->user()->id)}}" > 
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="example-text-input" class="col-form-label">Ancien mot de passe</label>
                                <input class="form-control" type="password" name="old" id="example-text-input" placeholder="Ancien mot de passe">
                                <span class="text-danger">@error('old'){{ $message }} @enderror </span>
                            </div>
                            <div class="form-group col-6">
                                <label for="example-text-input" class="col-form-label">Nouveau mot de passe</label>
                                <input class="form-control" type="password" name="new" id="example-text-input" placeholder="Nouveau mot de passe">
                                <span class="text-danger">@error('new'){{ $message }} @enderror </span>
                            </div>
                            <div class="form-group col-6">
                                <label for="example-email-input" class="col-form-label">Confirmer mot de passe</label>
                                <input class="form-control" type="password" name="confirm" placeholder="Confirmer mot de passe" id="example-email-input">
                                <span class="text-danger">@error('confirm'){{ $message }} @enderror </span>
                            </div>
                            <div class="d-flex justify-content-center align-items-center" style="margin:auto">
                                <button class="btn btn-template btn-lg" type="submit" id="btninscription" >Valider</button>
                            </div><br>
                           
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <br><br>

        
</div>

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