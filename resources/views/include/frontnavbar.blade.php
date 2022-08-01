@php
    use App\Http\Controllers\Frontend\CartController;
    $total = CartController::cartItems();
@endphp

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
            <div class="tip">2</div>
        </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
            <div class="tip">2</div>
        </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="{{route('home')}}"><img src="{{asset('frontend/img/logo.png')}}" alt=""> </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="#">Login</a>
        <a href="#">Register</a>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="categories__text">
                    <a href="{{route('home')}}"> <h1>WMN</h1></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class=" {{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{route('home')}}">Home</a></li>
                        <li class=" {{ request()->routeIs('shop') ? 'active' : '' }}"><a href="{{route('shop')}}">Shop</a></li>
                        <li class=" {{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                        <li class="{{ request()->routeIs('catergories') ? 'active' : '' }}"><a href="{{route('catergories')}}">catergories</a></li>
                        <li class="{{ request()->routeIs('view.cart') ? 'active' : '' }}"><a href="{{route('view.cart')}}">Cart</a></li>
                        @auth
                        <li class="{{ request()->routeIs('checkout') ? 'active' : '' }}"><a href="{{route('checkout')}}">Checkout</a></li>
                        <li class="{{ request()->routeIs('user.orders') ? 'active' : '' }}"><a href="{{route('user.orders')}}">My order</a></li>
                        <li class="nav-item dropdown">
                            <button class="dropdown-toggle text-capitalize rounded-circle border-0 btn-outline-info"  role="button" data-bs-toggle="dropdown" href="#">{{ Auth::user()->name }}</button>
                            <ul class="dropdown">
                                <li>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth

                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    @guest
                          @if (Route::has('login'))
                                <div class="header__right__auth">
                                    <a  href="{{ route('login') }}">Login</a>
                                </div>
                            @endif

                            @if (Route::has('register'))
                                <div class="header__right__auth">
                                    <a href="{{ route('register') }}">Register</a>
                                </div>
                            @endif
                    @else

                    @endguest
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="{{route('wishlist')}}"><span class="icon_heart_alt"></span>
                            <div class="tip">2</div>
                        </a></li>
                        <li><a href="{{route('view.cart')}}"><span class="icon_bag_alt"></span>
                            <div class="tip">{{$total}}</div>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
<!-- Offcanvas Menu End -->
