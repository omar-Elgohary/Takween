<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;





Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
Route::get('/', function () {
    return view('visitor.home');
})->name("home");


Route::get('products', [ProductController::class, 'displayAllProducts'])->name('products');


Route::get('/product', function () {
    return view('visitor.product');
})->name("product");

Route::get('/photo', function () {
    return view('visitor.photo');
})->name("photo");

Route::get('/freelancer', function () {
    return view('visitor.freelancer');
})->name("freelancer");

Route::get("user/freelancers",function(){
    return view("visitor.freelancers");
})->name("freelancers");


########################################## Start Freelancer ##############################################

Route::prefix("freelancer")->name("freelanc.")->group(function(){

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


    Route::get("/neworder",function(){
        return view("freelancer.neworder");
    })->name("neworder");


    Route::get("/showproducts",function(){
        return view("freelancer.showproducts");
    })->name("showproducts");

    Route::get("/addproduct",function(){
        return view("freelancer.addproduct");
    })->name("addproduct");

    Route::get("/editproduct",function(){
        return view("freelancer.editproduct");
    })->name("editproduct");

    Route::get("/product",function(){
        return view("freelancer.product");
        })->name("product");

    Route::resource('product',ProductController::class);

// ajax
    route::get("/getservice/{id}",[ProductController::class,'getservice']);
// end ajax


    Route::get("/reservation",function(){
        return view("freelancer.showreservation");
    })->name("reservation");



// start photo
    Route::get("/showphotos",function(){
        return view("freelancer.showphotos");
    })->name("showphotos");

    Route::get("/addphoto",function(){
        return view("freelancer.addphoto");
        })->name("addphoto");

    Route::get("/editphoto",function(){
    return view("freelancer.editphoto");
    })->name("editphoto");

    Route::get("/photo",function(){
        return view("freelancer.photo");
    })->name("photo");

    Route::resource('product',ProductController::class);
    //profile
    Route::get("/files",function(){
        return view("freelancer.files");
    })->name("files");

    Route::get("/wallet",function(){
        return view("freelancer.wallet");
    })->name("wallet");


    Route::get("/reviews",function(){
        return view("freelancer.reviews");
    })->name("reviews");
});
########################################## End Freelancer ##############################################




########################################## Start Customer ##############################################

Route::prefix("user")->name("user.")->group(function(){

    Route::get("/profile",function(){
        return view("user.userprofile");
    })->name("profile");

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


    Route::get('/showpublicrequest', function () {
        return view('user.showpublicrequest');
    })->name("showpublicrequest");

    Route::get('/showprivaterequest', function () {
        return view('user.showprivaterequest');
    })->name("showprivaterequest");

    Route::get('/showreservation', function () {
        return view('user.showreservation');
    })->name("showreservation");

    Route::get('/requestreservation', function () {
        return view('user.requestreservation');
    })->name("requestreservation");

    Route::get('/requestpublic', function () {
        return view('user.requestpublicservice');
    })->name("requestpublic");

    Route::get('/requestprivate', function () {
        return view('user.requestprivateservice');
    })->name("requestprivate");

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
