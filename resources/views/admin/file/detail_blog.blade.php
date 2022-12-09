@extends('admin/template_admin')

@section('title','Blog')

@section('blog','active')

@section('style')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('body')
<div class="main-content-inner"><br>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 ftco-animate"  style="background:white;padding:30px">
                    <h2 class="mb-3">{{$blog->title}}</h2>
                    <div class="text-center" style="width:400px; margin:auto;overflow: auto;;height:700px">
                        <img src="{{asset('uploads/image/'.$blog->image.'')}}" alt=""  style="width:auto">
                    </div>
                    {!!$blog->content!!}
                </div> <!-- .col-md-10 -->
                <div class="col-lg-3 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3>Récents</h3>
                        @foreach($recents as $recent)
                        <div class="block-21 mb-4 d-flex" style="background:white;padding:3px">
                            <a class="blog-img mr-4" style="width:50%">
                                <img src="{{asset('uploads/image/'.$recent->image.'')}}" alt="">
                            </a>
                            <div class="text">
                                <h5 class="heading"><a href="{{route('admin.detail_blog', $recent->id)}}">{{$recent->title}}</a></h5>
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
        </div>
    </section>
</div>

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