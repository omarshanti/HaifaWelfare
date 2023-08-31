<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

##################### HOME ROUTE ##########################
Route::group(
    [
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts/{id}', [App\Http\Controllers\HomeController::class, 'singlePost'])->name('singlePost');
Route::get('/posts/category/{id}', [App\Http\Controllers\HomeController::class, 'categoryPost'])->name('categoryPost');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contactUs'])->name('contactUs');
Route::get('/ourvision', [App\Http\Controllers\HomeController::class, 'ourVision'])->name('ourVision');
Route::get('/ouraims', [App\Http\Controllers\HomeController::class, 'ourAims'])->name('ourAims');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
##################### CONTACT ROUTE ##########################
Route::post('/contact/create', [App\Http\Controllers\ContactController::class, 'store'])->name('createContact');
});
############################################################
Route::group(
    [
        'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

    ##################### Dashboard ROUTE ##############################
    Route::get('dashboard', [\App\Http\Controllers\AdminController::class,'dashboard'])->name('dashboard');
    ##################### USER ROUTE ###################################
    Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
    ##################### CATEGORY ROUTE ################################
    Route::get('/categories/create',[App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
    Route::post('/categories/store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
    Route::get('/categories',[App\Http\Controllers\CategoryController::class,'index'])->name('category');
    Route::get('/categories/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::get('/categories/delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category.delete');
    Route::post('/categories/update/{id}',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
    ##################### POST ROUTE ####################################
    Route::get('/posts/create',[App\Http\Controllers\PostController::class,'create'])->name('post.create');
    Route::post('/posts/store',[App\Http\Controllers\PostController::class,'store'])->name('post.store');
    Route::get('/posts',[App\Http\Controllers\PostController::class,'index'])->name('post');
    Route::get('/posts/edit/{id}',[App\Http\Controllers\PostController::class,'edit'])->name('post.edit');
    Route::get('/posts/delete/{id}',[App\Http\Controllers\PostController::class,'destroy'])->name('post.delete');
    Route::post('/posts/update/{id}',[App\Http\Controllers\PostController::class,'update'])->name('post.update');
    ##################### IMAGES ROUTE ###############################
    Route::get('/images/create', [App\Http\Controllers\ImageController::class,'create'])->name('createImages');
    Route::get('/images', [App\Http\Controllers\ImageController::class,'index'])->name('images');
    Route::post('/images/created', [App\Http\Controllers\ImageController::class,'addImage'])->name('createImage');
    Route::get('/images/delete/{id}',[App\Http\Controllers\ImageController::class,'destroy'])->name('deleteImage');
    Route::post('/images/update/{id}',[App\Http\Controllers\ImageController::class,'update'])->name('updateImage');
    ##################### CONTACT ROUTE ###############################
    Route::get('/contactUs/{id?}/{notify?}', [App\Http\Controllers\AdminController::class,'contactShow'])->name('message');
    Route::get('/message/{id}/{notify?}', [App\Http\Controllers\AdminController::class,'singleMessage'])->name('singleMessage');
    Route::get('/contactUs/message/delete/{id}/{notify?}', [App\Http\Controllers\AdminController::class,'deleteMessage'])->name('deleteMsg');
    Route::get('/messages/markAllRead', [App\Http\Controllers\AdminController::class,'MarkAllRead'])->name('MarkAllRead');
    ##################### PROFILE ROUTE ###############################
    Route::get('/profile/setting', [App\Http\Controllers\UserController::class,'edit'])->name('profile');
    Route::post('/profile/update/{id}', [App\Http\Controllers\UserController::class,'update'])->name('profileUpdate');
    ##################### ADS ROUTE ###############################
    Route::get('/ads/create', [App\Http\Controllers\AdsController::class,'create'])->name('createAds');
    Route::get('/ads', [App\Http\Controllers\AdsController::class,'index'])->name('Ads');
    Route::post('/ads/created', [App\Http\Controllers\AdsController::class,'addImage'])->name('createdAds');
    Route::get('/ads/delete/{id}',[App\Http\Controllers\AdsController::class,'destroy'])->name('deleteAds');
    Route::get('/ads/edit/{id}',[App\Http\Controllers\AdsController::class,'edit'])->name('editAds');
    Route::post('/ads/update/{id}',[App\Http\Controllers\AdsController::class,'update'])->name('updateAds');

});



Route::get('/{page}', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth');

