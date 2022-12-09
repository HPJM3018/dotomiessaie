<div class="modal fade" id="edit-{{$user->id}}">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background:#8D3894">
                        <h3 class="text-center text-white" style="margin:auto">Modifier Administrateur</h3>
                    </div>
                    <div class="modal-body" style="background:#dad0db">
                        <form  id="formphone" action="{{route('admin.update_admin',$user->id)}}" method ="POST">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
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
                                    <label for="inputEmail3">Profession</label>
                                    <div class="" id="s1">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" value="{{$user->work}}" id="inputEmail3" name="work" placeholder="Profession">
                                            <span class="text-danger">@error('work'){{ $message }} @enderror </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3" >Mot de Passe (Facultatif)</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control"  id="inputPassword3" name="password">
                                        <span class="text-danger">@error('password'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                
                                <div class="col-6 mb-3">
                                    <label for="inputPassword3" >Confirmer Mot de Passe (Facultatif)</label>
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