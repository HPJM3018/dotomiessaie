@extends('user.template')

@section('blog', 'active')

@section('title', 'Blog')

@section('content')
<section class="section" style="height:150px">
	    <div class="container h-100">
	    	<div class="row h-100">
                <div class="col-md-12 h-100 d-flex flex-column justify-content-center text-center">
                    <h1 class="text-white h1">  Les Actualités</h1>
                </div>
            </div>
	    </div>
   </section>
<div class="container-fluid" style="background:whitesmoke"><br>
    <div class="container mt-5">
        <p class="my-3 text-center">Suivez les actualités sur tous les aspects de votre vie sexuelle</p>
        @if(count($blogs))
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4" >
                <div style="border-radius:15px; background:white;margin-bottom:50px">
                    <div style="">
                        <img src="{{asset('uploads/image/'.$blog->image.'')}}" alt="img" style="width:100%;height:300px; border-radius:15px;">
                    </div>
                    <div class="text  p-4 text-center">
                        <h3 class="heading"><a href="#" style="color:#8D3894; font-size:15px">{{substr($blog->title,0,23)}}...</a></h3>
                        <div class="text-center">
                            <a href="{{route('user.blog_detail',$blog->id)}}" class="btn btn-secondary"  style="background:#8D3894">En savoir plus ↓</a>
                        </div>
                        <br>
                        <?php
                            $person = App\Models\User::where('id',$blog->user_id)->first();
                        ?>
                        <div style="text-align:right">
                                <span style="color:#8D8894;font-size:0.8em">Publié le {{date("d M Y",strtotime($blog->created_at))}}<br> <b>{{$person->name}}({{$person->work}})</b></span>
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