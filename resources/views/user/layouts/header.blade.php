
<header class="header container-fluid">
	    <div class="container">
	        <div class="row align-items-center justify-content-between">
	            <div class=" logo col-sm-3 col-9">
	               <a href="{{route('user.home')}}"><img src="{{asset('image/logo.png')}}" alt="logo" style="margin-top:auto;height:80px"></a>
	            </div>
	            <button type="button" class="nav-toggler">
	               <span></span>
	            </button>
	            <nav class="nav">
				<ul class="">
						<li><a href="{{route('user.home')}}" class="@yield('home')">Acceuil</a></li>
						@if(Auth::user() && auth()->user()->role =="admin")
						<li><a href="{{route('user.blog')}}" class="@yield('blog')">Actualités</a></li>
						<li><a href="{{route('user.about')}}" class="@yield('about')">Notre Equipe</a></li>
						<li><a href="{{route('admin.dashboard')}}">Tableau de Bord</a></li>  
						@else
							<li><a href="{{route('user.call')}}" class="@yield('call')">Discuter</a></li>
							<li><a href="{{route('user.blog')}}" class="@yield('blog')">Actualités</a></li>
							@if(Auth::user())
								@if(Auth::user()->role != 'user')
									<li><a href="{{route('user.myblog')}}" class="@yield('myblog')">Mon blog</a></li>
								@endif
								<li><a href="{{route('user.profil')}}" class="@yield('profil')">Mon profil</a></li>
							@endif
							<li><a href="{{route('user.about')}}" class="@yield('about')">Notre Equipe</a></li>
							@if(Auth::user())
								<li><a href="{{route('logout')}}">Deconnexion</a></li>  
							@else
								<li><a href="{{route('login')}}">Se connecter</a></li>        
							@endif    
						@endif       
					</ul>
	            </nav>
	        </div>
	    </div>
	 </header>
