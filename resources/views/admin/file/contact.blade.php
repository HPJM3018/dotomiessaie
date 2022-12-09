@extends('admin/template_admin')

@section('title','Contacts')

@section('contacts','active')

@section('body')
<div class="main-content-inner">
    <div class="row">
        <!-- Dark table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-primary">Listes des commentaires</h4>
                    <div class="data-tables datatable-template">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Contenus</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->email}}</td>
                                        <td>+229{{$comment->phone}}</td>
                                        <td>{{$comment->content}}<br> <em class="text-info">{{date("M. d ,Y",strtotime($comment->created_at))}}</em></td>
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

@endsection