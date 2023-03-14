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
                <a class="d-inline-block align-self-center" href="{{route("user.cart")}}" class="btn">
                    <i class="fa-solid fa-cart-shopping cart-icon px-3"></i>
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
{{--  
<!-- Navbar -->
<div class="head">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContentr"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContentr">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Projects</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>
  
        <!-- Notifications -->
        <div class="dropdown">
          <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </div>
        <!-- Avatar -->
        <div class="dropdown">
          <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
              class="rounded-circle"
              height="25"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuAvatar"
          >
            <li>
              <a class="dropdown-item" href="#">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Settings</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</div>



  {{--  --}}


