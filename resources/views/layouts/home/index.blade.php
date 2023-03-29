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
    @include("layouts.component.modal.login2")
    @include("layouts.component.modal.signup")
    @include("layouts.component.modal.forgetpassword")
    @include("layouts.component.modal.otp")
    @include("layouts.component.modal.addtocart")
    @include("layouts.component.modal.switchtofreelancer")
    {{-- @include("layouts.component.modal.userRequests.payment") --}}


    <div class="content">
      <div class="typed-search-box stop-propagation document-click-d-none d-none bg-white rounded shadow-lg position-absolute left-0 top-100 w-100 " style="min-height:296px;
      background-color: #f8f9fa !important;
      z-index: 1;
      top: -23px !important;
      ">
        <div class="search-preloader absolute-top-center">
            <div class="dot-loader"></div>
        </div>
        <div class="search-nothing d-none p-3 text-center fs-16">
sadasdadasd
        </div>
        <div id="search-content" class="text-left">
          
        </div>
      </div>
    <div class="layout"></div>
    @yield("content")
   
    </div>
    @include("layouts.component.footer")
    

</div>

@include("layouts.component.script")
   @yield("js")

   <script>
    $('#search').on('keyup', function(){
            search();
        });

        $('#search').on('focus', function(){
            search();
        });
        function search(){
            var searchKey = $('#search').val();
            
            if(searchKey.length > 0){
                $('body').addClass("typed-search-box-shown");
                $('.typed-search-box').removeClass('d-none');
                $('.search-preloader').removeClass('d-none');


                $.ajax({
           
           url: "{{route('search.ajax')}}",
           type: "get",
           dataType: "json",
           data:{'search' : $('#search').val()},
           success: function(data) {
            console.log(data);
              if(data == '0'){
                        // $('.typed-search-box').addClass('d-none');
                        $('#search-content').html(null);
                        $('.typed-search-box .search-nothing').removeClass('d-none').html( "Sorry, nothing found for <strong>"+ $('#search').val() +"</strong>");
                        $('.search-preloader').addClass('d-none');
                      

                    }
                    else{
                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                        $('#search-content').html(" ");
                        $('#search-content').html(data);
                        $('.search-preloader').addClass('d-none');
                    }
                
           }
       
           });
                // $.get('{{ route('search.ajax') }}', { _token: $('meta[name="csrf_token"].data'), search:searchKey}, function(data){
                //     if(data == '0'){
                //         // $('.typed-search-box').addClass('d-none');
                //         $('#search-content').html(null);
                //         $('.typed-search-box .search-nothing').removeClass('d-none').html( "Sorry, nothing found for <strong>"+searchKey+"</strong>");
                //         $('.search-preloader').addClass('d-none');

                //     }
                //     else{
                //         $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                //         $('#search-content').html(data);
                //         $('.search-preloader').addClass('d-none');
                //     }
                // });
            }
            else {
                $('.typed-search-box').addClass('d-none');
                $('body').removeClass("typed-search-box-shown");
            }
        }
   </script>
</body>

</html>
