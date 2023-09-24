<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePasswordController;
use App\Models\Brand;
use App\Models\About;
use App\Models\Slider;
use App\Models\Portfolio;
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

Route::get('/', function () {
    $brands=Brand::all();
    $abouts=About::first();
    $aboutCount = About::count();
    

    if ($aboutCount === 0) {
        About::create([
            'title'=>'Null',
            'short_desc'=>' Null',
            'long_desc'=>'Null ',
        ]);
    } 
    $portfolio=Portfolio::all();


    return view('home',compact('brands','abouts','portfolio'));
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/brand',[BrandController::class,'allBrand'])->name('brand.list'); 
Route::post('/brand/add',[BrandController::class,'addBrand'])->name('brand.store');
Route::get('/brand/edit/{id}',[BrandController::class,'editbrand']);
Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
Route::get('/brand/restore/{id}',[BrandController::class,'restore'])->name('brand.restore');


Route::get('/slider',[SliderController::class,'allSliders'])->name('slider.list'); 
Route::post('/slider/add',[SliderController::class,'addSlider'])->name('slider.store');
Route::get('/slider/edit/{id}',[SliderController::class,'editslider']);
Route::post('/slider/update/{id}',[SliderController::class,'update'])->name('slider.update');
Route::get('/slider/restore/{id}',[SliderController::class,'restore'])->name('slider.restore');
Route::get('/slider/addd',[SliderController::class,'add']);



Route::get('/about',[AboutController::class,'list'])->name('about.list');
Route::get('/about/add',[AboutController::class,'add']);
Route::post('/about/store',[AboutController::class,'store'])->name('about.store');

Route::get('/about/edit/{id}',[AboutController::class,'edit']);
Route::post('/about/update/{id}',[AboutController::class,'update'])->name('about.update');
Route::get('/about/restore/{id}',[AboutController::class,'restore'])->name('about.restore');


Route::get('/portfolio',[PortfolioController::class,'list'])->name('portfolio.list');
Route::post('/portfolio/store',[PortfolioController::class,'store'])->name('portfolio.store');
Route::get('/portfolio/page',[PortfolioController::class,'listpage'])->name('portfolio.listpage');


Route::get('/contact/admin',[ContactController::class,'AdminContact'])->name('contact.admin');
Route::get('/contact/add',[ContactController::class,'add'])->name('contact.add');
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');
Route::get('/contact/edit/{id}',[ContactController::class,'edit']);
Route::post('/contact/update/{id}',[ContactController::class,'update'])->name('contact.update');
Route::get('/contact/delete/{id}',[ContactController::class,'delete'])->name('contact.delete');
Route::get('/contact',[ContactController::class,'show'])->name('contact');

Route::post('/contact/send',[ContactController::class,'send'])->name('contact.send');


Route::get('/change-password',[ChangePasswordController::class,'ChangePassword'])->name('password.change');


Route::get('/profile/edit',[ChangePasswordController::class,'ChangeProfile'])->name('profile.change');



require __DIR__.'/auth.php';
