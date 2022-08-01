<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CatergoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

         // public routes
         route::get('/' , [FrontendController::class , 'index'])->name('home');
         route::get('/contact' , [FrontendController::class , 'contact'])->name('contact');
         route::get('/catergory' , [FrontendController::class , 'catergory'])->name('catergories');
         route::get('/view_catergory/{slug}' , [FrontendController::class , 'viewcatergory'])->name('view.catergories');
         route::get('/view_catergory/{cat_slug}/{prod_slug}' , [FrontendController::class , 'DetailProduct']);

           //shop route
         Route::get('/shop' , [ShopController::class ,'index'])->name('shop');
         route::get('/view_shopcategory/{slug}' , [ShopController::class , 'viewcatergory'])->name('shop.catergory');
         //route::get('/view_shop/{cat_slug}/{prod_slug}' , [ShopController::class , 'DetailProduct']);


Auth::routes();

Route::middleware(['auth'])->group(function () {

                    // cart route
          Route::post('/add_to_cart',[CartController::class , 'addToCart'])->name('add.cart');
          Route::get('/cart',[CartController::class , 'viewCart'])->name('view.cart');
          Route::Delete('/delete_cart{id}',[CartController::class , 'deleteCart'])->name('delete.cart');

                    //wishlist route
          Route::get('/wishlist',[WishlistController::class , 'index'])->name('wishlist');
          Route::post('/add_to_wishlist',[WishlistController::class , 'addTowishlist'])->name('add.wishlist');
          Route::Delete('/delete_wishlist{id}',[WishlistController::class , 'deletewishlist'])->name('delete.wishlist');

                      // checkout route
          Route::get('/checkout',[CheckoutController::class , 'index'])->name('checkout');
          Route::POST('/place-order',[CheckoutController::class , 'placeOrder'])->name('order');


                         // route for client order
            Route::get('/my-order',[UserController::class , 'index'])->name('user.orders');
            Route::get('/view-order{id}',[UserController::class , 'view'])->name('view.orders');



});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', function () {return view('admin.index');})->name('dashboard');

             //catergory route for admin
             route::get('/catergories' , [CatergoryController::class , 'index'])->name('catergory');
             Route::post('/store_cat',[CatergoryController::class , 'store'])->name('store.catergory');
             Route::get('/edit_cat{id}',[CatergoryController::class , 'edit'])->name('edit.catergory');
             Route::post('/update_cat{id}',[CatergoryController::class , 'update'])->name('update.catergory');
             Route::DELETE('/delete_cat{id}',[CatergoryController::class , 'destroy'])->name('destroy.catergory');


                 // product route for admin
        Route::get('/products' , [ProductController::class , 'index'])->name('product');
        Route::post('/store_product',[ProductController::class , 'store'])->name('store.product');
        Route::get('/edit_product{id}',[ProductController::class , 'edit'])->name('edit.product');
        Route::post('/update_product{id}',[ProductController::class , 'update'])->name('update.product');
        Route::DELETE('/delete_product{id}',[ProductController::class , 'destroy'])->name('destroy.product');



                        // order route for admin
            Route::get('/orders',[OrderController::class , 'index'])->name('admin.orders');
            Route::get('/admin/view-order{id}',[OrderController::class , 'view'])->name('admin.view.orders');
            Route::POST('/admin/update-order{id}',[OrderController::class , 'updateorder'])->name('admin.update.orders');
            Route::get('/admin/history-order',[OrderController::class , 'orderhistory'])->name('admin.history.orders');

                       // route for userslist
            Route::get('/users',[DashboardController::class , 'users'])->name('users');
            ///Route::get('/view-user',[DashboardController::class , 'viewuser'])->name('view.user');





 });
