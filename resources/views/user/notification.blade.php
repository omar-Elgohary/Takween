@extends("layouts.home.index")

@section("og-title")
@endsection
@section("og-description")
@endsection
@section("og-image")
@endsection
@section("title")
notification
@endsection
@section("header")
@endsection


@section("css")

@endsection


@section("content")

<div class="notification">
    <div class="container">
         <div class="section-header">
            <h2>Notifications</h2>
        </div>
        <div class="row">

            @foreach (Auth::User()->unreadNotifications as $notification)
            <div class="noti row col-12">
            <div class="image col-4 ">
            <img src="{{asset("assets/images/vicky-hladynets-C8Ta0gwPbQg-unsplash.png")}}" alt="">
            </div>
        <div class="discription col-8">
            <span class="text-black-50">3m ago</span>
            <p>  {{$notification->data['message']}}</p>
        </div>
    </div>
        @endforeach
       
      
        </div>
     
        
    </div>
</div>

@endsection

@section("js")
    
@endsection