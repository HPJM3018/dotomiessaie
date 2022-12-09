<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>INTIMATE | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('style') 
    @include('admin/layouts/style')
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        @include('admin/layouts/sidebar') 
        <div class="main-content">
            @include('admin/layouts/header')
            @include('admin/layouts/title') 
            @yield('body')
        </div>
        @include('admin/layouts/footer')
        @yield('script')  
        @include('admin/layouts/script') 
    </div>
    
</body>

</html>
