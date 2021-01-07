<div id="top-bar" class="center dark">
    <p class="mb-0">£50 voucher after completing your first project with us.</p>
</div>
<header id="header" class="dark" data-sticky-class="not-dark">
    <div id="header-wrap" class="">
    <div class="container clearfix">

<div class="row">
        <div class="col-md-3">
                <div id="logo">
                    <a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ asset('img/frontend/xlogo.png') }}"><img src="{{ asset('img/frontend/xlogo.png') }}" alt="WORKTOP KINGS"></a>
                    <a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ asset('img/frontend/xlogo.png') }}"><img src="{{ asset('img/frontend/xlogo.png') }}" alt="WORKTOP KINGS"></a>
                </div>
            </div>
            <div class="col-md-6">
                    <div id="primary-menu-trigger"><i class="fas fa-bars"></i></div>
                 <nav id="primary-menu" class="not-dark with-arrows fleft">
                    <ul class="not-dark" style="touch-action: pan-y;">
                    <li><a href="{{ url('catalogs') }}"><div>Catalog</div></a></li>
                    <li><a href="#"><div>Inspiration</div></a></li>
                    <li><a href="#"><div>FAQ</div></a></li>
                    <li><a href="#"><div>Contact</div></a></li>
                    </ul>
                    </nav>
            </div>
            <div class="col-md-3">
                <ul class="side_menu">
                     @if (Auth::check())
                         <li><a href="{{url('favorites')}}"><i class="far fa-heart"></i></a></li>
                         <li><a href="{{ url('/dashboard') }}" class="round_btn">My Account</a></li>
                         <li><a href="{{ url('/logout') }}" class="round_btn">Logout</a></li>
                        @else
                        <li><a href="{{ url('/login') }}"><i class="far fa-heart"></i></a></li>
                        <li><a href="{{ url('/login') }}" class="round_btn">Login</a></li>
                     @endif


                </ul>
            </div>
</div>





    </div>
    </div>
    </header>
