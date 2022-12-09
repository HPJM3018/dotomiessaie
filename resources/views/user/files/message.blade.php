@extends('user.template')

@section('title', 'Discussion')

@section('call', 'active')

@section('style')
<style>

    .my_message{
        color:white;
        background: #8D3894;
        padding:15px;
        border: 1px solid transparent;
        border-radius:30px;
        width:auto;
        margin-left:auto
    }

    .my{
        color:#8D3894;
        font-size:0.8em;
    }

    .your_message{
        background: #8c389469;
        padding:15px;
        border: 1px solid transparent;
        border-radius:30px;
        width:auto;
        margin-right:auto
    }

    .your{
        color:#8D3894;
        font-size:0.8em;
    }

</style>

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
   		<div class="row">
            <div class="results">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success')}}
                    </div>
                @endif
            </div>
            <h4>Conversation avec <b style="color:#8D3894">{{$gyneco->pseudo}}</b> <a href="tel:+229{{$gyneco->phone}}" type="submit" class="btn btn-success text-white btn-lg"><i class="fa fa-phone"></i> Appelez</a></h4>
            <div class="container">
                <div style="border:2px solid #8D3894;padding:25px;border-radius:20px">
                    @if($messages->hasMorePages())
                        <div class="text-center">
                            <a href="{{$messages->nextPageUrl()}}" class="btn btn--sm" style="background:#8c389469">Voir messages précédents</a>
                        </div><br>
                    @endif
                    @foreach($messages as $message)
                        @if($message->from_id == auth()->user()->id)
                            <div class="row" style="text-align:right;margin-left:50%">
                                <div class="col-11 my_message">
                                    {!!nl2br(e($message->content))!!}
                                </div>
                                <div class="col-1">
                                    <img src="@if(auth()->user()->image == null){{asset('image/images/utilisateur.png')}} @else {{asset('uploads/image/'.auth()->user()->image.'')}} @endif" alt="img" style="width:150%;border-radius:50px">
                                </div><br>
                                <div class="my">{{date("d M Y à H:i:s e",strtotime($message->created_at))}}</div>
                            </div>
                        @endif
                        @if($message->to_id == auth()->user()->id)
                            <div class="row"  style="text-align:left;margin-right:50%">
                                <div class="col-1">
                                    <img src="@if($gyneco->image == null){{asset('image/images/utilisateur.png')}} @else {{asset('uploads/image/'.$gyneco->image.'')}} @endif" alt="img" style="width:150%;border-radius:50px">
                                </div>
                                <div class="col-11 your_message">
                                    {!!nl2br(e($message->content))!!}
                                </div><br>
                                <span class="your">{{date("d M Y à H:i:s e",strtotime($message->created_at))}}</span>
                            </div>
                        @endif
                    @endforeach
                    <br>
                    
                    @if($messages->previousPageUrl())
                        <br>
                        <div class="text-center">
                            <a href="{{$messages->previousPageUrl()}}" class="btn btn--sm" style="background:#8c389469">Voir messages suivants</a>
                        </div>
                    @endif
                    <form action="{{route('user.save_message',$gyneco->id)}}" method="post">  
                        @csrf
                        <div class="row  text-center">
                            <div class="col-10">
                                <textarea name="content" class="form-control" placeholder="Votre message" required></textarea>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn bg-intimate text-white btn-lg"><i class="fa fa-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
   </section>
@endsection

@section('script')
<script src="{{asset('js/snipper.js')}}"></script>
@endsection