<section id="home" class="welcome-hero">
    <div class="top-area">
        <div class="header-area">
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
         <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">Car Rentals<span></span></a>
        </div>
        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li class=" active"><a href="{{url('/')}}">home</a></li>
                <li ><a href="{{url('/rentals')}}">rentals</a></li>
                <li ><a href="{{url('/about')}}">about</a></li>
                <li ><a href="{{url('/contect')}}">contact</a></li>
                @if (Route::has('login'))
                @auth                  
                    <li ><a href="{{ url('admin/dashboard') }}">
                        Dashboard
                       </a></li>
                @else
                    <li > <a href="{{ route('login') }}">
                        Log in
                    </a></li>

                    @if (Route::has('register'))
                        <li > <a   href="{{ route('register') }}" >
                                Register
                        </a></li>
                    @endif
                @endauth
            @endif
            </ul>
        </div>
    </div>
</nav>
</div>
<div class="clearfix"></div>
</div>

<div class="container">
    <div class="welcome-hero-txt">
        <h2>Rent is the Best Cars with Affordable Prices</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore   magna aliqua. 
        </p>
        <button class="welcome-btn" onclick="window.location.href='#'">Browse Cars</button>
    </div>
</div>
</section>