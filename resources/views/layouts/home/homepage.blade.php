<!DOCTYPE html>
<html lang="en"
{{-- dir="rtl" --}}
>




<head>


<title> @yield("title")</title>
@include("layouts.component.head")
  

@yield("css")


</head> 
<body>
    {{-- <div id="preloading"></div> --}}
    <div id="layout-wrapper">

        @auth
        @include("layouts.component.nav") 
        @endauth
      
        @guest
        @include("layouts.component.nav2")
        @endguest

@include("layouts.component.modal.login")
@include("layouts.component.modal.signup")
@include("layouts.component.modal.forgetpassword")


<div class="content">
<div class="layout"></div>
 @yield("content")







 @include("layouts.component.footer") 
</div>

</div>
@include("layouts.component.script")
@yield("js")
</body>

</html>