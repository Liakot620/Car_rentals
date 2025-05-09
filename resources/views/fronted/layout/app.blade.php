<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

           
            <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
            <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
            
            <link rel="shortcut icon" type="image/icon" href="{{asset('assets/logo/favicon.png')}}"/>
           
            <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    
            <link rel="stylesheet" href="{{asset('assets/css/linearicons.css')}}">
    
            <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    
            <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    
            <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">

            <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
            
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
            
            <link rel="stylesheet" href="{{asset('assets/css/bootsnav.css')}}" >	
            
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
            
            <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
            <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">

           
    </head>

<body >
    
     @include('components.fronted.nav')

    
      @yield('content')

      @include('components.fronted.footer')

       @if (Route::has('login'))
       <div class="h-14.5 hidden lg:block"></div>
        @endif

		<script src="{{asset('assets/js/jquery.js')}}"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		
		<script src="{{asset('assets/js/bootsnav.js')}}"></script>

        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <script src="{{asset('assets/js/custom.js')}}"></script>
    </body>
</html>
