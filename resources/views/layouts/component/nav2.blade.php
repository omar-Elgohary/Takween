<div class="head">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{asset("assets/images/newlogo.png")}}" alt=""></a>
        <form class="search-form can-hide d-flex flex-grow-1 px-lg-3 " style="display:@yield("nosearch")" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">

                <form class="search-form search-nav d-flex flex-grow-1 px-lg-3 " style="display:@yield("nosearch")" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

            </li>
            <li class="nav-item">
                <a class="nav-link text-capitalize active" aria-current="page" href="{{route("home")}}" style="color: #fff;" >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize" href="{{route("products")}}"  style="color: #fff;">product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-capitalize" href="{{route("freelancers")}}" style="color: #fff;">freelancer</a>
                </li>
                <li class="nav-item text-capitalize text-white-100">
                    <a class="nav-link text-capitalize" href="#" class="btn" data-bs-toggle="modal"  data-bs-target="#login"style="color: #fff;">login</a>

                </li>
            <li class="nav-item dropdown">
            {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li class="nav-item">
                    <a class="nav-link text-capitalize active" aria-current="page" href="{{route("home")}}" style="color: #fff;" >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="{{route("products")}}"  style="color: #fff;">product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="{{route("freelancers")}}" style="color: #fff;">freelancer</a>
                    </li>
                    <li class="nav-item text-capitalize text-white-100">
                        <a class="nav-link text-capitalize" href="#" class="btn" data-bs-toggle="modal"  data-bs-target="#login"style="color: #fff;">login</a>

                    </li>
            </ul> --}}
            </li>

        </ul>

        {{-- <form class="" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        </div>
        </div>
    </div>
    </nav>
{{-- <div class="logo">
    <img src="{{asset("assets/images/logo.png")}}" alt="">
</div> --}}
</div>

<header id="page-topbar2">
<div class="carve">
</div>
</header>

