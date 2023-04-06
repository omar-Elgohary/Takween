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

<div class="privacy&police">

<div class="container">
    <div class="section-header">
        <h2>privacy & police</h2>

    </div>

    <div>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. In eaque, minima omnis quae aliquid asperiores mollitia distinctio nisi, dolores repudiandae et necessitatibus iusto harum? Aliquid consequuntur obcaecati voluptas reiciendis placeat!
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, facere iure. Labore minus sequi blanditiis accusamus vitae autem, nisi neque esse, cumque fugiat nostrum repellendus magni fuga soluta voluptates. Accusamus.
    </div>

</div>

</div>
@endsection

@section("js")

@endsection
