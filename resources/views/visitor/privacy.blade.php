@extends("layouts.home.homepage")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
privacy&policy
@endsection
@section("header")
@endsection
@section("css")
@endsection

@section("content")

@auth
<a class="addrequesticon" href="{{route('user.requestpublic')}}">
    <i class="fa-solid fa-plus"></i>
</a>  
@else
<a class="addrequesticon" href="#login2"  data-bs-toggle="modal">
    <i class="fa-solid fa-plus"></i>
</a>
@endauth

<div class="privacy">

<div class="container">
    <div class="section-header">
        <h2>privacy & police</h2>
    </div>

</div>

</div>
@endsection

@section("js")

@endsection
