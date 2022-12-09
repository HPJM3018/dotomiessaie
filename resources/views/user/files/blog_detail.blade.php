@extends('user.template')

@section('blog', 'active')

@section('title', 'Détail')

@section('content')
<style type="text/css">
 	.rec{
 		width: 90%;
        margin:auto;
 		border-radius: 20px;
 		bottom: 200px;
 		height: 150px;
 		background-color: #8D3894;
 		box-shadow: 1px 1px 8px 0px hsl(0deg 0% 0% / 20%);
 	}
 	.cer{
 		width: 150px;
 		height: 250px;
 		border-radius: 20px;
 		background-image: url("{{asset('uploads/image/'.$blog->image.'')}}");
 		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
        margin-left:75%;
        margin-top:-150px;
 		transform: translateY(-50px);
 		box-shadow: 1px 1px 8px 0px hsl(0deg 0% 0% / 20%);

 	}
 	.doto .text{
 		margin-top: 60px;
 		padding: 20px 50px;
 	}
 	.usercard{
 		display: flex;
 		 height:fit-content;
 		 width: ;
 		 box-shadow: 1px 1px 8px 0px hsl(0deg 0% 0% / 20%);
 		 padding: 10px;
 	}

</style>
<section class="section" style="height:150px">
	    <div class="container h-100">
	    	<div class="row h-100">
                <div class="col-md-12 h-100 d-flex flex-column justify-content-center text-center">
                    <h1 class="text-white h1"> Articles</h1>
                </div>
            </div>
	    </div>
   </section>
<div class="container-fluid" style="background:whitesmoke"><br>

<section class="container" >
	<div class="row">
		<div class="col-lg-9 ftco-animate"  style="background:white;padding:30px;overflow: auto;;height:700px">
			<h2 class="mb-3">{{$blog->title}}</h2>
			<div class="text-center" style="width:400px; margin:auto">
				<img src="{{asset('uploads/image/'.$blog->image.'')}}" alt=""  style="width:100%">
			</div>
			<br>
			{!!$blog->content!!}
		</div> <!-- .col-md-10 -->
		<div class="col-lg-3 sidebar ftco-animate">
			<div class="sidebar-box ftco-animate">
				<h3>Récents</h3>
				@foreach($recents as $recent)
				<div class="block-21 mb-4 d-flex" style="background:white;padding:3px">
					<a class="blog-img mr-4" style="width:50%">
						<img src="{{asset('uploads/image/'.$recent->image.'')}}" style="width:100%" alt="">
					</a>
					<div class="text">
						<h5 class="heading"><a href="{{route('user.blog_detail', $recent->id)}}">{{$recent->title}}</a></h5>
						<div class="meta">
							<div><a href="#"><span class="icon-calendar"></span>{{date("M. d ,Y",strtotime($recent->created_at))}}</a></div>
							<?php 
							$user = App\Models\User::find($recent->user_id);
							?>
							<div><a href="#"><span class="icon-person"></span> {{$user->name}}</a></div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div><!-- END COL -->
	</div>
</section>

@endsection