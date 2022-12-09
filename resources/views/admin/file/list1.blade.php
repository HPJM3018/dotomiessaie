@extends('admin/template_admin')

@section('title','Listes des utilisateurs')

@section('list1','active')

@section('body')


<div class="main-content">
    <div class="main-content-inner">
        <div class="row">
            <!-- Dark table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Listes des utilisateurs</h4>
                        <div class="data-tables datatable-template">
                            <table id="dataTable3" class="text-center">
                                <thead class="text-capitalize">
                                    <tr>
                                        <th>Pseudo</th>
                                        <th>Telephone</th>
                                        <th>Ville</th>
                                        <th>Sexe</th>
                                        <th>Profession</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->pseudo}}</td>
                                        <td>(+229){{$user->phone}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>{{$user->sex}}</td>
                                        <td>{{$user->work}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            @if($user->is_active)
                                            <a href=""  class="btn btn-danger" data-toggle="modal" data-target="#lock-{{$user->id}}"  title="Bloquer"><span class="fa fa-lock"></span></a>
                                            @else
                                            <a href="" class="btn btn-success" data-toggle="modal" data-target="#lock-{{$user->id}}"  title="Bébloquer"><span class="fa fa-unlock"></span></a>
                                            @endif
                                        </td>

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