@extends('user.template')

@section('myblog', 'active')

@section('title', 'Mon Blog')

@section('style')

<style type="text/css">
 	.rec{
 		width: 90%;
        margin:auto;
 		bottom: 200px;
 		height: 150px;
 		background-color: #8D3894;
 		box-shadow: 1px 1px 8px 0px hsl(0deg 0% 0% / 20%);
 	}
 	.cer{
 		width: 350px;
 		height: 350px;
 		border-radius: 50%;
 		background-image: url("{{asset('image/images/santesexuelle.jpg')}}");
 		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
        margin-left:75%;
        margin-top:-200px;
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('content')
<section class="section" style="height:150px">
	    <div class="container h-100">
	    	<div class="row h-100">
                <div class="col-md-12 h-100 d-flex flex-column justify-content-center text-center">
                    <h1 class="text-white h1"> Ajouter du contenu</h1>
                </div>
            </div>
	    </div>
   </section>
<div class="container-fluid" style="background:whitesmoke"><br>

<section class="container">
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <form method="post" action="{{route('user.save_blog')}}" enctype="multipart/form-data"> 
                        @csrf
                        <div class="results">
                            @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success')}}
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h4 class="header-title">Ajouter un nouvel article</h4>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="example-text-input" class="col-form-label">Titre</label>
                                    <input class="form-control" type="text" name="title" id="example-text-input" placeholder="Titre de l'article">
                                    <span class="text-danger">@error('title'){{ $message }} @enderror </span>
                                </div>
                                <div class="form-group col-6">
                                    <label for="example-email-input" class="col-form-label">Image Principal</label>
                                    <input class="form-control" type="file" name="image" id="example-email-input">
                                    <span class="text-danger">@error('image'){{ $message }} @enderror </span>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="example-text-input" class="col-form-label">Contenu de l'article</label>
                                <textarea id="summernote" name="content"></textarea>
                                <span class="text-danger">@error('content'){{ $message }} @enderror </span>
                            </div><br>
                            <div class="form-row text-center"> 
                                <button type="submit" class="btn btn-primary btn-lg mt-4 pr-4 pl-4">Enregistrer le contenu</button>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
@endsection