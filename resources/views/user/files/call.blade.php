@extends('user.template')

@section('title', 'Discussion')

@section('call', 'active')

@section('style')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('css/snipper.css')}}">

@endsection

@section('content')

	<!-- Slider -->
	<section class="section" style="height:150px">
	    <div class="container h-100">
	    	<div class="row h-100">
                <div class="col-md-12 h-100 d-flex flex-column justify-content-center text-center">
                    <h1 class="text-white h1"> Discussion</h1>
                </div>
            </div>
	    </div>
   </section>
   <!-- Consultation VIP -->
   <section class="container" style="background:"><br><br>
   @if(auth()->user()->role != 'gyneco')
   		<div class="row">
            <h4 style="color:#8D3894">Listes personnes ressources</h4>
            <div class="container">
                <div class="row">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="3" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner">
                            @foreach($gynecos as $gyneco)
                            <a class="item" href="{{route('user.message',$gyneco->id)}}" style="text-decoration:none; ">
                                <div class="pad15" style="@if($gyneco->online)background:rgba(4, 248, 25, 0.475)@endif">
                                    <div class="">
                                        <img src="@if($gyneco->image == null){{asset('image/images/utilisateur.png')}} @else {{asset('uploads/image/'.$gyneco->image.'')}} @endif" alt="img" style="width:100%">
                                    </div>
                                    <p class="lead">{{$gyneco->name}} - {{$gyneco->work}}</p>
                                    <p style="color:green">@if($gyneco->online)En ligne @endif</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <button class="btn bg-intimate text-white leftLst" ><i class="fa fa-chevron-left"></i></button>
                        <button class="btn bg-intimate text-white rightLst"><i class="fa fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <div class="row">
            <h4 style="color:#8D3894">Historiques de discussion</h4>
                @foreach($persons as $person)
            <div class="row" style="width:80%;margin:auto;margin-top:10px">
                    <?php 
                    $user = App\Models\User::find($person->po);
                    ?>
                        <a href="{{route('user.message',$user->id)}}" class="col-10 text-justify" style="border:2px solid #8D3894;color:#8D3894;text-decoration:none;padding:5px 5px 5px 20px">
                            <b>{{$user->pseudo}} - {{$user->work}}</b>
                        </a>
                        <a href="{{route('user.message',$user->id)}}" class="col-2 text-center text-white" style="border:2px solid #8D3894;text-decoration:none;padding:5px;background:#8D3894">
                            {{$person->nbr}}
                        </a>
            </div>
                @endforeach
            
        </div>
   </section>
@endsection

@section('script')
<script src="{{asset('js/snipper.js')}}"></script>
@endsection