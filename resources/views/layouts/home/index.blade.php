<!DOCTYPE html>
<html lang="en"

@if ( App::getLocale() =="ar")
  dir="rtl"  

  @else
  dir="ltr"  

@endif

>
<head>

<title> @yield("title")</title>

    @include("layouts.component.head")
    @yield("css")
    </head>
    <body>

    {{-- <div id="preloading"></div> --}}
    <div id="layout-wrapper">

    @include("layouts.component.nav")
    @include("layouts.component.modal.login")
    @include("layouts.component.modal.signup")
    @include("layouts.component.modal.forgetpassword")
    @include("layouts.component.modal.otp")
    @include("layouts.component.modal.addtocart")
    @include("layouts.component.modal.switchtofreelancer")
    @include("layouts.component.modal.userRequests.payment")


    <div class="content">
    <div class="layout"></div>
    @yield("content")
   
    </div>
    @include("layouts.component.footer")
    

</div>

@include("layouts.component.script")
    @yield("js")
</body>

</html>
