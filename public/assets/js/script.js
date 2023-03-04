var preload = document.getElementById("preloading");
window.addEventListener('load', function () {


  $("#preloading").fadeOut();


})

$(document).ready(function () {

 const productContainers = [...document.querySelectorAll('.scrollable')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
   let containerDimensions = item.getBoundingClientRect();
   let containerWidth = containerDimensions.width;

   nxtBtn[i].addEventListener('click', () => {
     item.scrollLeft += containerWidth;

   })

   preBtn[i].addEventListener('click', () => {
     item.scrollLeft -= containerWidth;


   })

})


// $(".hart").click(function(e){

//   // var id=$(".hart").data('id');
//   // $(this).toggleClass("active");
// var id =$(".hart").attr('data-id');
// // var  type =$(".hart").attr('data-type');

// $.ajax({
//     url: "{{ URL('user/addorremovelikes') }}/" + id,
//     type: "GET",
//     // data:{'type':type},
//     dataType: "json",
//     success: function(data) {
//       if(data){
//         console.log(data);
//         $(this).toggleClass("active");
//       }else{


//       }
//     }

//     });


// });


$(".visaicon").addClass("active");
$(".apayicon").removeClass("active");
$(".walleticon").removeClass("active");
$(".visa").show();
$(".apay").hide();
$(".wallet").hide();

$(".visaicon").click(function (){

  $(this).addClass("active");
  $(".apayicon").removeClass("active");
  $(".walleticon").removeClass("active");
  $(".visa").show();
  $(".apay").hide();
  $(".wallet").hide();

});
$(".apayicon").click(function (){

  $(this).addClass("active");
  $(".visaicon").removeClass("active");
  $(".walleticon").removeClass("active");
  $(".visa").hide();
  $(".apay").show();
  $(".wallet").hide();
});
$(".walleticon").click(function (){
  $(this).addClass("active");
  $(".apayicon").removeClass("active");
  $(".visaicon").removeClass("active");
  $(".visa").hide();
  $(".apay").hide();
  $(".wallet").show();
});



// code of choose private request or reservation


// $('#form-chooserequest').on('submit',function(e){
//     e.preventDefault();
//     var value=$("input[name=requesttype]:checked").val();

//     console.log(value);
//     switch(value){
//     case "private":  location.href='requestprivate'; break;
//     case "reservation":  location.href='reservation'; break;
//     }
// });



});




  function OTPInput() {
const inputs = document.querySelectorAll('#otpinupts  *[id]');
for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } }
OTPInput();




//const imgs = document.querySelectorAll('.img-select a');
//const imgBtns = [...imgs];
//let imgId = 1;
//
//imgBtns.forEach((imgItem) => {
//    imgItem.addEventListener('click', (event) => {
//        event.preventDefault();
//        imgId = imgItem.dataset.id;
//        slideImage();
//    });
//});
//
//function slideImage(){
//    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
//
//    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
//}
//
//window.addEventListener('resize', slideImage);
