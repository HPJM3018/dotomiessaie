<div class="modal fade" id="edit-{{$user->id}}">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:#8D3894">
                        <h3 class="text-center text-white" style="margin:auto">Modifier personnel</h3>
                    </div>
                    <div class="modal-body" style="background:#dad0db">
                        <form  id="formphone" action="{{route('admin.update_personal',$user->id)}}" method ="POST">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Nom Complet</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value="{{$user->name}}"  id="inputEmail3" name="name" placeholder="Nom Complet">
                                        <span class="text-danger">@error('name'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control"  value="{{$user->email}}" id="inputEmail3" name="email" placeholder="Email">
                                        <span class="text-danger">@error('email'){{ $message }} @enderror </span>
                                    </div>
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Pseudo</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"  value="{{$user->pseudo}}" id="inputEmail3" name="pseudo" placeholder="Pseudo">
                                        <span class="text-danger">@error('pseudo'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3" id="phone_div">
                                    <label for="inputEmail3">Telephone</label>
                                    <div class="col-sm-12" style="color:black">
                                        <input type="text" id="phone" class="form-control  @error('phone') is-invalid @enderror"  value="{{$user->phone}}" name="phone" onkeypress="verifierCaracteres(event); return false;" >
                                        <span class="text-danger">@error('phone'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Ville</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"  value="{{$user->city}}" id="inputEmail3" name="city" placeholder="Ville">
                                        <span class="text-danger">@error('city'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3">Sexe</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="sex">
                                            <option value=""> Sexe</option>
                                            <option value="Féminin" @if($user->sex == "Féminin") selected @endif>Féminin</option>
                                            <option @if($user->sex == "Masculin") selected @endif value="Masculin">Masculin</option>
                                        </select>
                                        <span class="text-danger">@error('sex'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <b>Type d'activité</b><br>
                                    <div class="row text-center">
                                        <div class="col-6">
                                        <input type="radio" id="tog1" name="role" @if($user->role == 'gyneco') checked @endif value="gyneco" class="@error('role') is-invalid @enderror"> Gynécologue
                                        </div>
                                        <div class="col-6">
                                        <input type="radio" name="role" id="tog2" @if($user->role == 'teach') checked @endif value="teach" class="@error('role') is-invalid @enderror"> Educateur
                                        </div>
                                    </div>
                                    <span class="text-danger">@error('role'){{ $message }} @enderror </span>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputEmail3">Profession</label>
                                    <div class="" id="s2">
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
                                    <div class="" id="s1">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{$user->work}}" id="inputEmail3" name="work2" placeholder="Profession">
                                            <span class="text-danger">@error('work2'){{ $message }} @enderror </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3" >Mot de Passe(Facultatif)</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control"  id="inputPassword3" name="password">
                                        <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3" >Confirmer Mot de Passe(Facultatif)</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control"  id="inputPassword3" name="confirm">
                                        <span class="text-danger">@error('confirm'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-template btn-lg" type="submit" id="btninscription" >Sauvegarder</button>
                            </div><br>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>