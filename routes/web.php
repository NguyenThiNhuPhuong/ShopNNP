<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PersonalController;
use \App\Http\Controllers\GoogleController;
use \App\Http\Controllers\FacebookController;
use App\Http\Controllers\AjaxController;

// Google Sign In
Route::get('/google/login', [GoogleController::class, 'getGoogleSignInUrl']);
Route::get('/google/callback', [GoogleController::class, 'loginCallback']);
Route::post('/google/login/store', [GoogleController::class, 'googleLogin']);
Route::post('/google/register/store', [GoogleController::class, 'googleRegister']);

// Facebook Sign In
Route::get('/facebook/login', [FacebookController::class, 'getFacebookSignInUrl']);
Route::get('/facebook/callback', [FacebookController::class, 'loginCallback']);
Route::post('/facebook/login/store', [FacebookController::class, 'facebookLogin']);
Route::post('/facebook/register/store', [FacebookController::class, 'facebookRegister']);

//Admin
Route::get('Admin/user/register', [UserController::class, 'register'])->name('register');
Route::post('Admin/user/register/store/add', [UserController::class, 'add']);
Route::get('Admin/user/login', [UserController::class, 'login'])->name('login');
Route::post('Admin/user/login/store', [UserController::class, 'store']);
Route::get('Admin/user/logout', [UserController::class, 'logout'])->name('logout');

//Customer
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/product', [ShopController::class, 'shop'])->name('product');
Route::get('/product/category/{name}/{id}', [ShopController::class, 'shopCategory']);
Route::any('/product/productdetail/{id}', [ShopController::class, 'product_detail']);
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group(function () {
    //Admin
    Route::prefix('Admin')->middleware(['auth.admin'])->group(function () {
        //home
        Route::get('/home', [HomeAdminController::class, 'home'])->name('admin');
        //Category
        Route::get('/category', [CategoryController::class, 'category'])->name('adminCategory');
        Route::post('/category/store/add', [CategoryController::class, 'add']);
        Route::get('/category/editCategory/{id}', [CategoryController::class, 'editCategory']);
        Route::post('/category/store/edit', [CategoryController::class, 'edit']);
        Route::post('/category/delete', [CategoryController::class, 'deletes']);
        //product
        Route::get('/product/addProduct', [ProductController::class, 'addProduct'])->name('adminAddProduct');
        Route::get('/product/listProduct', [ProductController::class, 'listProduct'])->name('adminListProduct');
        Route::get('/product/editProduct/{id}', [ProductController::class, 'editProduct']);
        Route::post('/product/store/add', [ProductController::class, 'add']);
        Route::post('/product/store/edit', [ProductController::class, 'edit']);
        Route::post('/product/delete', [ProductController::class, 'deletes']);
        //slider
        Route::get('/slider/addSlider', [SliderController::class, 'addSlider'])->name('adminAddSlider');
        Route::get('/slider/listSlider', [SliderController::class, 'listSlider'])->name('adminListSlider');
        Route::get('/slider/editSlider/{id}', [SliderController::class, 'editSlider']);
        Route::post('/slider/store/add', [SliderController::class, 'add']);
        Route::post('/slider/store/edit', [SliderController::class, 'edit']);
        Route::post('/slider/delete', [SliderController::class, 'deletes']);
        //discount
        Route::get('/discount/addDiscount', [DiscountController::class, 'addDiscount'])->name('adminAddDiscount');
        Route::get('/discount/listDiscount', [DiscountController::class, 'listDiscount'])->name('adminListDiscount');
        Route::get('/discount/editDiscount/{id}', [DiscountController::class, 'editDiscount']);
        Route::post('/discount/store/add', [DiscountController::class, 'add']);
        Route::post('/discount/store/edit', [DiscountController::class, 'edit']);
        Route::post('/discount/delete', [DiscountController::class, 'deletes']);
        //feedback
        Route::post('/feedback/store/add', [ContactController::class, 'add'])->name('addFeedBack');
        Route::get('/feedback/listFeedback', [ContactController::class, 'listFeedback'])->name('adminListFeedback');
        //order
        Route::get('/order/listOrder', [OrderController::class, 'listOrder'])->name('adminOrder');
        Route::get('/order/orderstatus/{id}', [OrderController::class, 'listOrderStatus']);
        Route::get('/order/orderDetail/{id}', [OrderController::class, 'orderDetail']);
        Route::post('/order/orderDetail/updateOrderstatus', [AjaxController::class, 'update_orderstatus']);
    });
    //Customer
    Route::get('/myCart', [CartController::class, 'showCart'])->name('myCart');
    Route::get('/contact/feedback/notification', [ContactController::class, 'notification'])->name('notification_feedback');
    Route::post('/addCart', [CartController::class, 'addCart'])->name('addCart');
    Route::post('/updateCart', [CartController::class, 'updateCart'])->name('updateCart');
    Route::post('/deleteCart', [CartController::class, 'deleteCart'])->name('deleteCart');
    Route::get('/checkout', [CartController::class, 'checkOut'])->name('checkOut');
    Route::get('/buyNow/{id}/{num}', [CartController::class, 'buyNow'])->name('buyNow');
    Route::get('/checkout/notification', [CartController::class, 'notification'])->name('notification');
    Route::post('/getDistrict', [AjaxController::class, 'getDistrict']);
    Route::post('/getWard', [AjaxController::class, 'getWard']);
    Route::post('/applyDiscount', [AjaxController::class, 'applyDiscount']);
    Route::post('/order', [OrderController::class, 'addOrder']);
    Route::post('/orderNow', [OrderController::class, 'orderNow'])->name('orderNow');
    Route::get('/personal/resetpassword', [PersonalController::class, 'resetPassword'])->name('resetPassUser');
    Route::get('/personal/notification', [PersonalController::class, 'notification'])->name('notificationUser');
    Route::get('/personal/order', [PersonalController::class, 'order'])->name('orderUser');
    Route::get('/personal/order/{id}', [PersonalController::class, 'orderDetail'])->name('orderDetailUser');
    Route::get('/personal', [PersonalController::class, 'personal'])->name('personal');
    

});
