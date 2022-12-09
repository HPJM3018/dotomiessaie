<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{asset('image/logo1.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    
                    <li class=""><a href="{{route('user.home')}}"><i class="ti-dashboard "></i> <span>Accueil</span></a></li>

                    <li class="@yield('dashboard')"><a href="{{route('admin.dashboard')}}"><i class="ti-dashboard "></i> <span>Tableau de bord</span></a></li>

                    <li class="@yield('list1')"><a href="{{route('admin.list1')}}"><i class="ti-money"></i> <span>Listes des utilisateurs</span></a></li>

                    <li class="@yield('list2')"><a href="{{route('admin.list2')}}"><i class="ti-layout-sidebar-left"></i> <span>Listes des personnel</span></a></li>

                    <li class="@yield('list3')"><a href="{{route('admin.list3')}}"><i class=" ti-layout-cta-left"></i> <span>Listes des adminstrateurs</span></a></li>

                    <li class="@yield('blog')"><a href="{{route('admin.blog')}}"><i class="ti-layers-alt"></i> <span>Articles</span></a></li>

                    <li class="@yield('contacts')"><a href="{{route('admin.contact')}}"><i class="ti-gallery"></i> <span>Contacts</span></a></li>

                    <li class="@yield('rating')"><a href="{{route('admin.rating')}}"><i class="ti-user"></i> <span>Avis</span></a></li>

                    <li class="active"><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> <span>Déconnexion</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->