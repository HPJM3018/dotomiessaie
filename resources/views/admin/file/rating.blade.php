@extends('admin/template_admin')

@section('title','Avis')

@section('rating','active')

@section('body')
<div class="main-content-inner">
    <div class="row">
        <!-- Dark table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-primary">Avis</h4>
                    <div class="data-tables datatable-template">
                        <table id="dataTable3" class="text-center">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Note</th>
                                    <th>Contenu</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ratings as $rating)
                                    <tr>
                                        <td>{{$rating->id}}</td>
                                        <td>{{$rating->name}}</td>
                                        <td>
                                            @for($i=0;$i<$rating->star;$i++)
                                                <img width="30px" src="{{asset('image/images/star-icon.svg')}}">
                                            @endfor
                                            @for($i=0;$i<(5-$rating->star);$i++)
                                                <img width="30px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Star_empty.svg/800px-Star_empty.svg.png">
                                            @endfor
                                            {{$rating->star}}
                                        </td>
                                        <td>{{$rating->content}}</td>
                                        <td>{{$rating->created_at}}</td>
                                        <td>@if($rating->visible)
                                            <a href="{{route('admin.visible', $rating->id)}}" class="btn btn-danger" title="BLoquer le commentaire">Bloquer</a>
                                            @else
                                            <a href="{{route('admin.visible', $rating->id)}}" class="btn btn-success" title="Publier le commentaire">Afficher</a> 
                                            @endif
                                        </td>
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