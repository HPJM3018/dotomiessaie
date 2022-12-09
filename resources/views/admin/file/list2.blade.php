@extends('admin/template_admin')

@section('title','Listes des personnals')

@section('list2','active')

@section('style')


<link rel="stylesheet" href="{{asset('intlTelInput/css/intlTelInput.css')}}">

@endsection

@section('body')


<div class="main-content">
    <div class="main-content-inner">
        <div class="text-center" ><br>
            <a type="button" href="" data-toggle="modal" data-target="#add_personal" class="btn btn-template btn-lg col-6" style="font-size:1.5em">Ajouter personnel</a>
        </div>

            @if (Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Message</strong> {{ Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        <!--Modal withdraw-->
        <div class="modal fade" id="add_personal">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:#8D3894">
                        <h3 class="text-center text-white" style="margin:auto">Ajouter personnel</h3>
                    </div>
                    <div class="modal-body" style="background:#dad0db">
                        <form  id="formphone" action="{{route('admin.add_personal')}}" method ="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Nom Complet</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value="{{@old('name')}}"  id="inputEmail3" name="name" placeholder="Nom Complet">
                                        <span class="text-danger">@error('name'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control"  value="{{@old('email')}}" id="inputEmail3" name="email" placeholder="Email">
                                        <span class="text-danger">@error('email'){{ $message }} @enderror </span>
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Pseudo</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"  value="{{@old('pseudo')}}" id="inputEmail3" name="pseudo" placeholder="Pseudo">
                                        <span class="text-danger">@error('pseudo'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3" id="phone_div">
                                    <label for="inputEmail3">Telephone</label>
                                    <div class="col-sm-12" style="color:black">
                                        <input type="text" id="phone" class="form-control  @error('phone') is-invalid @enderror"  value="{{@old('phone')}}" name="phone" onkeypress="verifierCaracteres(event); return false;" >
                                        <span class="text-danger">@error('phone'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Ville</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"  value="{{@old('city')}}" id="inputEmail3" name="city" placeholder="Ville">
                                        <span class="text-danger">@error('city'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3">Sexe</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="sex"  value="{{@old('sex')}}">
                                            <option value=""> Sexe</option>
                                            <option value="Féminin">Féminin</option>
                                            <option value="Masculin">Masculin</option>
                                        </select>
                                        <span class="text-danger">@error('sex'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <b>Type d'activité</b><br>
                                    <div class="row text-center">
                                        <div class="col-6">
                                        <input type="radio" id="togg1" name="role" value="gyneco" class="@error('activity') is-invalid @enderror"> Gynécologue
                                        </div>
                                        <div class="col-6">
                                        <input type="radio" name="role" id="togg2" value="teach" class="@error('activity') is-invalid @enderror"> Educateur
                                        </div>
                                    </div>
                                    <span class="text-danger">@error('role'){{ $message }} @enderror </span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Profession</label>
                                    <div class="" id="d2">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="checkbox" name="work[]" value="Andrologue" class="@error('work[]') is-invalid @enderror"> Andrologue
                                            </div>
                                            <div class="col-6">
                                                <input type="checkbox" name="work[]" value="Gynécologue" class="@error('work[]') is-invalid @enderror"> Gynécologue
                                            </div>
                                            <span class="text-danger">@error('work'){{ $message }} @enderror </span>
                                        </div>
                                    </div>
                                    <div class="" id="d1">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{@old('work2')}}" id="inputEmail3" name="work2" placeholder="Profession">
                                            <span class="text-danger">@error('work2'){{ $message }} @enderror </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3" >Mot de Passe</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control"  id="inputPassword3" name="password">
                                        <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3" >Confirmer Mot de Passe</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control"  id="inputPassword3" name="confirm">
                                        <span class="text-danger">@error('confirm'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-template btn-lg" type="submit" id="btninscription" >S'inscrire</button>
                            </div><br>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Listes des personnels</h4>
                        <div class="data-tables datatable-template">
                            <table id="dataTable3" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Nom Complet</th>
                                        <th>Pseudo</th>
                                        <th>Telephone/Email</th>
                                        <th>Ville</th>
                                        <th>Sexe</th>
                                        <th>Rôle</th>
                                        <th>Profession</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->pseudo}}</td>
                                        <td>(+229){{$user->phone}}<br>{{$user->email}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>{{$user->sex}}</td>
                                        <td>@if($user->role == "gyneco") Docteur @else Educateur @endif</td>
                                        <td>{{$user->work}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#edit-{{$user->id}}"  title="Modifier"><span class="fa fa-edit"></span></a>
                                            @if($user->is_active)
                                            <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#lock-{{$user->id}}"  title="Bloquer"><span class="fa fa-lock"></span></a>
                                            @else
                                            <a href="" class="btn btn-success" data-toggle="modal" data-target="#lock-{{$user->id}}"  title="Bébloquer"><span class="fa fa-unlock"></span></a>
                                            @endif
                                        </td>

                                        @include('admin.file.modal_edit_personal')

                                        <div class="modal fade" id="lock-{{$user->id}}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background:#8D3894">
                                                        <h3 class="text-center text-white" style="margin:auto">Ajouter personnel</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Voulez-vous @if($user->is_active) bloquer @else débloquer @endif cet utilisateur?</h3> 
                                                    </div>
                                                    <div class="modal-footer" style='margin:auto'>
                                                        <a type="button" class="btn btn-secondary" data-dismiss="modal">Non</a>
                                                        <a type="button" href="{{route('admin.lock',$user->id)}}" class="btn btn-danger">Oui</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dark table end -->
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

<script>
    let togg1 = document.getElementById("togg1");
    let togg2 = document.getElementById("togg2");
    let d1 = document.getElementById("d1");
    let d2 = document.getElementById("d2");
    d1.style.display = "none";
    d2.style.display = "none";
    togg1.addEventListener("click", () => {
    if(getComputedStyle(d1).selected = "none"){
        d1.style.display = "none";
        d2.style.display = "block";
    } 
    })

    function togg(){
    if(getComputedStyle(d2).selected != "none"){
        d2.style.display = "none";
        d1.style.display = "block";
    } 
    };
    togg2.onclick = togg;
</script>

<script>
    let tog1 = document.getElementById("tog1");
    let tog2 = document.getElementById("tog2");
    let s1 = document.getElementById("s1");
    let s2 = document.getElementById("s2");
    s1.style.display = "none";
    s2.style.display = "none";
    tog1.addEventListener("click", () => {
    if(getComputedStyle(s1).selected = "none"){
        s1.style.display = "none";
        s2.style.display = "block";
    } 
    })

    function tog(){
    if(getComputedStyle(s2).selected != "none"){
        s2.style.display = "none";
        s1.style.display = "block";
    } 
    };
    tog2.onclick = tog;
</script>
@endsection