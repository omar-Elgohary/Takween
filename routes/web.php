<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FreelancerRequestController;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::get('/', [HomeController::class, 'index'])->name("home");


Route::get('products', [ProductController::class, 'displayAllProducts'])->name('products');


Route::get('/product/{id}', [ProductController::class, 'usershowproduct'])->name("product");

Route::get('/photo', function () {
    return view('visitor.photo');
})->name("photo");


// Route::get('/freelancer/{id}', [UserController::class, 'FreelancerProfile'])->name("freelancer"
Route::get('/showFreelancerDetails/{id}', [UserController::class, 'showFreelancerDetails'])->name("showFreelancerDetails");

Route::get("user/freelancers", [UserController::class, 'allFreelancers'])->name("freelancers");

Route::get('filter', [ProductController::class, 'filter'])->name('filter');

########################################## Start Freelancer ##############################################

Route::prefix("freelancer")->name("freelanc.")->middleware('auth','is_freelancer')->group(function(){

    Route::post('updateFreelancerProfile/{id}', [UserController::class, 'updateFreelancerProfile'])->name('updateFreelancerProfile');

    Route::get("/product",function(){
        return view("freelancer.products");
    });

    Route::get("/profile",function(){
        return view("freelancer.profile");
    })->name("profile");


    Route::get("/mywork",function(){
        return view("freelancer.mywork");
    })->name("mywork");


    Route::get("/neworder",[FreelancerRequestController::class,'getneworder'])->name("neworder");
    Route::get("/mywork",[FreelancerRequestController::class,'getmywork'])->name("mywork");

    Route::post('/sendoffer/{id}',[FreelancerRequestController::class,'sendoffer'])->name("sendoffer");
    Route::get('/request/finish/{id}',[FreelancerRequestController::class,'finishRequest'])->name("finishrequest");
    



    // Route::get("/showproducts",function(){
    //     return view("freelancer.showproducts");
    // })->name("showproducts");

    // Route::get("/addproduct",function(){
    //     return view("freelancer.addproduct");
    // })->name("addproduct");

    // Route::get("/editproduct",function(){
    //     return view("freelancer.editproduct");
    // })->name("editproduct");

    // Route::get("/product",function(){
    //     return view("freelancer.product");
    //     })->name("product");

    Route::resource('product', ProductController::class);

    // get all services of one category
    Route::get('category/{id}', [ProductController::class, 'getCategoryServices'])->name('getCategoryServices');

    Route::get("/reservation", [ReservationController::class, 'freelancerReservations'])->name("reservation");
    Route::post('/reservation/status/{id}', [ReservationController::class, 'changeStatus'])->name('reservations.status');



// start photo
    // Route::get("/showphotos",function(){
    //     return view("freelancer.showphotos");
    // })->name("showphotos");

    // Route::get("/addphoto",function(){
    //     return view("freelancer.addphoto");
    //     })->name("addphoto");

    // Route::get("/editphoto",function(){
    // return view("freelancer.editphoto");
    // })->name("editphoto");

    // Route::get("/photo",function(){
    //     return view("freelancer.photo");
    // })->name("photo");

    Route::resource('photo', PhotoController::class);

    //profile
    Route::get("/files/{id}", [UserController::class, 'FreelancerFiles'])->name("files");

    Route::get("/wallet",[UserController::class,'freelancerwallet'])->name("wallet");


    Route::get("/reviews",function(){
        return view("freelancer.reviews");
    })->name("reviews");


});
########################################## End Freelancer ##############################################




########################################## Start Customer ##############################################

Route::prefix("user")->name("user.")->middleware('auth')->group(function(){

    Route::get("/profile",[UserController::class,'getprofile'])->name("profile");

    Route::post('updateUserProfile/{id}', [UserController::class, 'updateUserProfile'])->name('updateUserProfile');

    Route::get("/notification",function(){
        return view("user.notification");
    })->name("notification");

    Route::get("/cart",function(){
        return view("user.chart");
    })->name("cart");

    Route::get("/freelancer/profile",function(){
        return view("user.freelancerprofile");
    })->name("freelancer");


    // Reservations
    Route::get('/requestreservation/{freelancer_id}', [ReservationController::class, 'index'])->name('requestreservation');
    Route::post('/requestreservation/store/{freelancer_id}', [ReservationController::class, 'store'])->name('requestreservation.store');
    Route::get('reservations', [ReservationController::class, 'show'])->name('reservations');


    Route::get('/showpublicrequest', [RequestController::class, 'publicRequests'])->name("showpublicrequest");
    Route::get('/showprivaterequest', [RequestController::class, 'privateRequests'])->name("showprivaterequest");


// request route
    Route::get('/requestpublic', [RequestController::class, 'requestpublicservice'])->name("requestpublic");
    Route::post('/StoreRequest/{freelancer_id}', [RequestController::class, 'store'])->name("request.store");
    Route::post('/cancelRequest/{id}', [RequestController::class, 'cancel'])->name("request.cancel");
    Route::post('/reviewRequest/{id}',[RequestController::class, 'review'])->name("request.review");
    // get all services of one category
    Route::get('category/{id}', [RequestController::class, 'getCategoryServices'])->name('getCategoryServices');


    Route::get('/requestprivate/{id}', [RequestController::class, 'requestUserToFreelancer'])->name("requestprivate");
//get offer request

    Route::get('/getrequestoffer/{id}', [RequestController::class, 'getrequestoffer'])->name("getrequestoffer");
    Route::get('/rejectofferrequest', [RequestController::class, 'rejectofferrequest'])->name("rejectofferrequest");
    Route::get('/acceptoffertopay/{id}/{re}', [RequestController::class, 'acceptoffertopay'])->name("acceptoffertopay");
    // payment


    Route::post('/walletpay', [PaymentController::class, 'walletpay'])->name("walletpay");
    // end payment


    // add or delete likes
    Route::get('/addorremovelikes/{id}',[UserController::class,'addorremovelikes']);

    // add cart
    Route::get('/addcart/{id}',[UserController::class,'addcart']);

    Route::resource('/chat',ChatController::class);



Route::get('/request/completed/{id}',[RequestController::class,'completeRequest'])->name("completerequest");
Route::post('/private/request/rejectoffer/{id}',[RequestController::class,'privaterejectoffer'])->name("privaterejectoffer");
Route::post('/private/request/aceptoffer/{id}',[RequestController::class,'privateracceptoffer'])->name("privateracceptoffer");


});

########################################## End Customer ##############################################


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
