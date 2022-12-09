@extends('admin/template_admin')

@section('title','Blog')

@section('blog','active')

@section('body')

<img src="https://i.imgur.com/EEguU02.jpg" alt="image small"></a> 

    <div class="main-content-inner">
        <div class="card-area"><br>
            <div class="text-center" >
                <a type="button" href="{{route('admin.add_blog')}}" class="btn btn-template btn-lg col-6" style="font-size:1.5em">Nouvel article</a>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 mt-5">
                    <div class="card card-bordered">
                        <img class="card-img-top img-fluid" src="{{asset('uploads/image/'.$blog->image.'')}}" alt="image" style="height:200px">
                        <div class="card-body">
                            <h5 class="title">{{substr($blog->title,0,23);}}</h5>
                            <div class="row" style="margin-right:auto">
                                <div class="col-4">
                                    <a href="{{route('admin.detail_blog', $blog->id)}}" class="btn btn-primary"><span class="fa fa-chevron-down"></span><br>Voir plus</a>
                                </div>
                                <div class="col-4">
                                    <a href="{{route('admin.show_blog', $blog->id)}}" class="btn btn-warning"><span class="fa fa-edit"></span><br>Modifier</a>
                                </div>
                                <div class="col-4">
                                    @if($blog->is_lock)
                                    <a href="{{route('admin.lock_blog', $blog->id)}}" class="btn btn-success" > <span class="fa fa-unlock"></span><br>Débloquer</a>
                                    @else
                                    <a href="{{route('admin.lock_blog', $blog->id)}}" class="btn btn-danger"> <span class="fa fa-lock"></span><br>Bloquer</a>
                                    @endif
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
        </div>
    </div>

@endsection