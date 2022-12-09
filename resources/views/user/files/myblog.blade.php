@extends('user.template')

@section('myblog', 'active')

@section('title', 'Mon Blog')

@section('content')
<section class="section" style="height:150px">
	    <div class="container h-100">
	    	<div class="row h-100">
                <div class="col-md-12 h-100 d-flex flex-column justify-content-center text-center">
                    <h1 class="text-white h1"> Mon Blog</h1>
                </div>
            </div>
	    </div>
   </section>
<div class="container-fluid" style="background:whitesmoke"><br>
    <div class="container mt-5">
        <p class="my-3 text-center">Historique de tous votre contenu</p>
        <div class="text-center">
            <a href="{{route('user.add_blog')}}" class="btn bg-intimate text-white btn-lg"> Ajouter un Nouveau contenu</a>
        </div>
        <br>
        @if(count($blogs))
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4" >
                <div style="border-radius:15px; background:white">
                    <div style="">
                        <img src="{{asset('uploads/image/'.$blog->image.'')}}" alt="img" style="width:100%;height:300px; border-radius:15px;">
                    </div>
                    <div class="text  p-2 text-center">
                        <h3 class="heading"><a href="#" style="color:#8D3894">{{substr($blog->title,0,23)}}...</a></h3>
                        <div class="text-center">
                            <a href="{{route('user.blog_detail',$blog->id)}}" class="btn btn-secondary"  style="background:#8D3894">En savoir plus ↓</a>
                        </div>
                        <hr>
                        <?php
                            $person = App\Models\User::where('id',$blog->user_id)->first();
                        ?>
                        <div class="row">
                            <div class="col-6" style="text-align:left;">
                                <div class="dropdown">
                                    <button class="btn btn-warning" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{route('user.show_blog',$blog->id)}}">Modifier</a></li>
                                        <li><a class="dropdown-item btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">Supprimer</a></li>
                                    </ul>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Supprimer l'article:{{$blog->title}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Voulez-vous supprimer cet article?
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</a>
                                                    <a type="button" href="{{route('user.delete_blog',$blog->id)}}" class="btn btn-danger">OUI</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" >
                                <span style="color:#8D3894;font-size:0.8em">Fait le {{date("d M Y",strtotime($blog->created_at))}}<br> <b>{{$person->name}}({{$person->work}})</b></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
                {{ $blogs->links() }}
            </div>
        @else
        <div class="text-center" style='color:gray;font-size:1.5em'>
            Aucune information disponible
        </div>
        @endif
        <br>
    </div>

</div>

@endsection