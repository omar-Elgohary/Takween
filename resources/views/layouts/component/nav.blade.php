@include('layouts.component.modal.switchtofreelancer')

<div class="head">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-search"></i>
                </button>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <a href="{{ route('home') }}" class=" d-inline-block align-self-center ms-2 px-2">Home</a>
            <a href="{{ route('products') }}"class=" d-inline-block align-self-center  ms-2 px-2">products</a>
            <a href="{{ route('freelancers') }}"class=" d-inline-block align-self-center  ms-2 px-2">freelancers</a>

            @if (!auth()->check())
                <a class="d-inline-block align-self-center" href="#" class="btn" data-bs-toggle="modal"
                data-bs-target="#login">login</a>
            @else
                <a class="d-inline-block align-self-center" href="{{route("user.cart.index")}}" class="btn">
                    <i class="fa-solid fa-cart-shopping cart-icon px-3"></i>
                    {{App\Models\Cart::where('user_id' ,auth()->user()->id)->count()}}
                </a>
            @endif

            @if (auth()->check())
            @if (auth()->user()->type=="customer")
           

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('Admin3/assets/images/users/'.Auth::user()->profile_image) }}"
                        alt="Header Avatar">
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <button class="btn-switchtofreelanc" data-bs-target="#switchtofreelancer" data-bs-toggle="modal">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        <p>switch to freelancer account</p>
                    </button>

                    <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Profile</span></a>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    @if($localeCode!=app()->getLocale())
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <i class="fa-solid fa-earth-asia font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">language ({{ $properties['native'] }})</span></a>
                   @endif

                @endforeach
                    <a class="dropdown-item d-block" href="{{route("user.notification")}}"><i class="uil-bell font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">notification</span> <span class="badge  rounded-pill mt-1 ms-2">03</span></a>
                    <a class="dropdown-item" href="{{route("user.reservations")}}"><i class="fa-regular fa-calendar font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">reservation</span></a>
                    
                    <a class="dropdown-item" href="{{route("user.showpublicrequest")}}"><i class="fa-brands fa-squarespace font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">requests</span></a>
                   
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item  logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                </div>
            </div>

            @elseif (auth()->user()->type=="freelancer")
          

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('Admin3/assets/images/users/'.Auth::user()->profile_image) }}"
                        alt="Header Avatar">
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route("freelanc.profile")}}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Profile</span></a>

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    @if($localeCode!=app()->getLocale())
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <i class="fa-solid fa-solid fa-earth-americas font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">language ({{ $properties['native'] }})</span></a>


                   @endif
                @endforeach
                    <a class="dropdown-item d-block" href="{{route("user.notification")}}"><i class="uil-bell font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">notification</span> <span class="badge  rounded-pill mt-1 ms-2">03</span></a>
                    <a class="dropdown-item" href="{{route('freelanc.reservation')}}"><i class="fa-regular fa-calendar font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">reservation</span></a>
                    <a class="dropdown-item" href="{{route("freelanc.neworder")}}"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">orders</span></a>
                    <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item  logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                        <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                </div>
            </div>
            @endif
    @endif
    </div>
</div>

    <div class="logo">
        <img src="{{asset("assets/images/logo.png")}}" alt="">
    </div>
</div>

<header id="page-topbar">
    <div class="layout"></div>
        <div class="carve">
            <form class="search-form d-flex flex-grow-1 px-lg-3 " style="display:@yield("nosearch")" role="search">
                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
</header>
