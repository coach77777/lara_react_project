<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChangePassController;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {

    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $services = DB::table('services')->get();
    $images = Multipic::all();//Portfolio

    return view('home', compact('brands', 'abouts', 'services', 'images'));
});

//Category Controller
Route::get('/category/all', [CategoryController::class,'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class,'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class,'Update'])->name('category.update');
Route::get('/category/softdelete/{id}', [CategoryController::class,'SoftDelete'])->name('category.softdelete');
Route::get('/category/restore/{id}', [CategoryController::class,'Restore'])->name('category.restore');
Route::get('/category/pdelete/{id}', [CategoryController::class,'PDelete'])->name('category.pdelete');

//Brand Route
Route::get('/brand/all', [BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class,'StoreBrand'])->name('store.brand');

Route::get('brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');

Route::post('/brand/update/{id}', [BrandController::class, 'Update'])->name('brand.update');
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete'])->name('brand.delete');


// Multi Image route
Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.image');
Route::post('/multi/add', [BrandController::class,'StoreImg'])->name('store.image');

// admin All Routes
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');

Route::get('slider/edit/{id}', [HomeController::class, 'edit'])->name('slider.edit');

Route::post('/slider/update/{id}', [HomeController::class, 'Update'])->name('slider.update');
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete'])->name('slider.delete');


// Home About All Routes
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout'])->name('about.edit');
Route::post('/update/homeabout/{id}', [AboutController::class, 'UpdateAbout'])->name('update.homeabout');
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout'])->name('about.delete');

// portfolio page
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

// Home Service All routes
Route::get('/home/service', [ServiceController::class, 'HomeService'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'AddService'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/service/edit/{id}', [ServiceController::class, 'EditService'])->name('service.edit');
Route::post('/update/service/{id}', [ServiceController::class, 'UpdateService'])->name('update.service');

// Admin Contact Page
Route::get('/admin/contact', [ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/add/contact', [ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/store/contact', [ContactController::class, 'StoreContact'])->name('store.contact');
Route ::get('/contact/edit/{id}', [ContactController::class, 'EditContact'])->name('contact.edit');
Route::post('/update/contact/{id}', [ContactController::class, 'UpdateContact'])->name('update.contact');
Route::get('/contact/delete/{id}', [ContactController::class, 'DeleteContact'])->name('contact.delete');


//Home Contact Page Route
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route ::post('/contact/form', [ContactController::class, 'ContactForm'])->name('contact_form');
Route::get('/admin/message', [ContactController::class, 'AdminMessage'])->name('admin.message');
Route::get('/message/delete/{id}', [ContactController::class, 'DeleteMessage'])->name('message.delete');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

//elooquent ORM
        // $users = User::all();

        // Query Builder
       //$users = DB::table('users')->get();

    //     return view('dashboard', ['users' => $users]); // Correct syntax
    // })->name('dashboard');

    return view('admin.index'); // Correct syntax
    })->name('dashboard');
});

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

//Change Password and user profile
Route::get('/user/password', [ChangePassController::class, 'CPassword'])->name('change.password');
Route::post('/password/update', [ChangePassController::class, 'UpdatePassword'])->name('password.update');

// user profile
Route ::get('/user/profile', [ChangePassController::class, 'PUpdate'])->name('profile.update');
Route ::post('/user/profile/update', [ChangePassController::class, 'UpdateProfile'])->name('update.user.profile');
