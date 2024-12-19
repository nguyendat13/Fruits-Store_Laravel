<?php

use Illuminate\Support\Facades\Route;
//Controller trang người dùng
use App\Http\Controllers\frontend\HomeController as TrangchuController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\AboutusController as VechungtoiController;
use App\Http\Controllers\frontend\CartController as GiohangController;
use App\Http\Controllers\frontend\ProccedController as ThanhtoanController;
use App\Http\Controllers\frontend\OrderController as DonhangController;
use App\Http\Controllers\frontend\UserController as TaikhoanController;
use App\Http\Controllers\frontend\LoginController as DangnhapController;
use App\Http\Controllers\frontend\RegisterController as DangkyController;

//Controller trang quản trị
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;

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

//Route trang người dùng
Route::get('/public', [TrangchuController::class, 'index'])->name('frontend.home');
Route::get('/public/san-pham', [SanphamController::class, 'index'])->name('frontend.product');
Route::get('/public/san-pham/{slug}', [SanphamController::class, 'detail'])->name('frontend.product.detail');
Route::get('/public/lien-he', [LienheController::class, 'index'])->name('frontend.contact');
Route::get('/public/ve-chung-toi', [VechungtoiController::class, 'index'])->name('frontend.about_us');
Route::get('/public/gio-hang', [GiohangController::class, 'index'])->name('frontend.cart');
Route::get('/public/thanh-toan', [ThanhtoanController::class, 'index'])->name('frontend.procced');
Route::get('/public/don-hang', [DonhangController::class, 'index'])->name('frontend.order');
Route::get('/public/tai-khoan', [TaikhoanController::class, 'index'])->name('frontend.user');
Route::get('/public/dang-nhap', [DangnhapController::class, 'index'])->name('frontend.login');
Route::get('/public/dang-ky', [DangkyController::class, 'index'])->name('frontend.register');


Route::prefix('admin')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("backend.dashboard.index");
    //Product
    Route::prefix('product')->group(function () {
        Route::get('trash', [ProductController::class, 'trash'])->name('backend.product.trash');
        Route::get('{product}/delete', [ProductController::class, 'delete'])->name('backend.product.delete');
        Route::get('{product}/restore', [ProductController::class, 'restore'])->name('backend.product.restore');
        Route::get("{product}/status", [ProductController::class, "status"])->name('backend.product.status');
        Route::get("{product}/edit", [ProductController::class, "edit"])->name('backend.product.edit'); // Route tĩnh trước
        Route::get("{product}/show", [ProductController::class, "show"])->name('backend.product.show'); // Route tham số sau
        Route::get("create", [ProductController::class, "create"])->name('backend.product.create');
    });
    Route::resource('product', ProductController::class);
    ///

    Route::prefix('category')->group(function () {
        Route::get('trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::get('{category}/delete', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('{category}/restore', [CategoryController::class, 'restore'])->name('category.restore');
        Route::get("{category}/status", [CategoryController::class, "status"])->name('category.status');
    });
    Route::resource('category', CategoryController::class);
    ///

    Route::prefix('brand')->group(function () {
        Route::get('trash', [BrandController::class, 'trash'])->name('brand.trash');
        Route::get('{brand}/delete', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('{brand}/restore', [BrandController::class, 'restore'])->name('brand.restore');
        Route::get("{brand}/status", [BrandController::class, "status"])->name('brand.status');
        Route::get("{brand}/edit", [BrandController::class, "edit"])->name('brand.edit'); // Route tĩnh trước
        Route::get("{brand}/show", [BrandController::class, "show"])->name('brand.show'); // Route tham số sau
    });
    Route::resource('brand', BrandController::class);
    ///
    Route::prefix('post')->group(function () {
        Route::get('trash', [PostController::class, 'trash'])->name('backend.post.trash');
        Route::get('{post}/delete', [PostController::class, 'delete'])->name('backend.post.delete');
        Route::get('{post}/restore', [PostController::class, 'restore'])->name('backend.post.restore');
        Route::get("{post}/status", [PostController::class, "status"])->name('backend.post.status');
    });
    Route::resource('post', PostController::class);
    ///
    Route::prefix('topic')->group(function () {
        Route::get('trash', [TopicController::class, 'trash'])->name('backend.topic.trash');
        Route::get('{topic}/delete', [TopicController::class, 'delete'])->name('backend.topic.delete');
        Route::get('{topic}/restore', [TopicController::class, 'restore'])->name('backend.topic.restore');
        Route::get("{topic}/status", [TopicController::class, "status"])->name('backend.topic.status');
    });
    Route::resource('topic', TopicController::class);

    ///
    Route::prefix('banner')->group(function () {
        Route::get('trash', [BannerController::class, 'trash'])->name('backend.banner.trash');
        Route::get('{banner}/delete', [BannerController::class, 'delete'])->name('backend.banner.delete');
        Route::get('{banner}/restore', [BannerController::class, 'restore'])->name('backend.banner.restore');
        Route::get("{banner}/status", [BannerController::class, "status"])->name('backend.banner.status');
    });
    Route::resource('banner', BannerController::class);

    ///
    Route::prefix('menu')->group(function () {
        Route::get('trash', [MenuController::class, 'trash'])->name('backend.menu.trash');
        Route::get('{menu}/delete', [MenuController::class, 'delete'])->name('backend.menu.delete');
        Route::get('{menu}/restore', [MenuController::class, 'restore'])->name('backend.menu.restore');
        Route::get("{menu}/status", [MenuController::class, "status"])->name('backend.menu.status');
    });
    Route::resource('menu', MenuController::class);

    ///
    Route::prefix('order')->group(function () {
        Route::get('trash', [OrderController::class, 'trash'])->name('backend.order.trash');
        Route::get('{order}/delete', [OrderController::class, 'delete'])->name('backend.order.delete');
        Route::get('{order}/restore', [OrderController::class, 'restore'])->name('backend.order.restore');
        Route::get("{order}/status", [OrderController::class, "status"])->name('backend.order.status');
    });
    Route::resource('order', OrderController::class);

    ///
    Route::prefix('user')->group(function () {
        Route::get('trash', [UserController::class, 'trash'])->name('backend.user.trash');
        Route::get('{user}/delete', [UserController::class, 'delete'])->name('backend.user.delete');
        Route::get('{user}/restore', [UserController::class, 'restore'])->name('backend.user.restore');
        Route::get("{user}/status", [UserController::class, "status"])->name('backend.user.status');
    });
    Route::resource('user', UserController::class);
    ///
    Route::prefix('contact')->group(function () {
        Route::get('trash', [ContactController::class, 'trash'])->name('backend.contact.trash');
        Route::get('{contact}/delete', [ContactController::class, 'delete'])->name('backend.contact.delete');
        Route::get('{contact}/restore', [ContactController::class, 'restore'])->name('backend.contact.restore');
        Route::get("{contact}/status", [ContactController::class, "status"])->name('backend.contact.status');
    });
    Route::resource('contact', ContactController::class);
});
