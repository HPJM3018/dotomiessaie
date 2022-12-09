<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">@yield('title')</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{route('admin.dashboard')}}" style="color:#8D3894">Accueil</a></li>
                    <li><span>@yield('title')</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                @if(auth()->user()->image)
                <img class="avatar user-thumb" src="{{asset('uploads/image/'.auth()->user()->image.'')}}" alt="avatar">
                @else
                <img class="avatar user-thumb" src="{{asset('admin/assets/images/author/avatar.png')}}" alt="avatar">
                @endif
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item text-success" href="{{route('admin.profil')}}">Profil</a>
                    <a class="dropdown-item text-danger" href="{{route('logout')}}">Deconnexion</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->