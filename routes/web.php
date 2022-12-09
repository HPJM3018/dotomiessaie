<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//UserController
Route:: any('/', [UserController::class, 'home'])->name('user.home');
Route:: any('/about', [UserController::class, 'about'])->name('user.about');
Route:: get('/blog', [UserController::class, 'blog'])->name('user.blog');
Route:: get('/blog_detail/{id}', [UserController::class, 'blog_detail'])->name('user.blog_detail');


Route::group(['middleware' => ['authuser']],function () {
    //User
    Route:: get('/call', [UserController::class, 'call'])->name('user.call');
    Route:: get('/message/{id}', [UserController::class, 'message'])->name('user.message');
    Route:: post('/save_message/{id}', [UserController::class, 'save_message'])->name('user.save_message');
    Route:: get('/profil', [UserController::class, 'profil'])->name('user.profil');
    Route:: put('/image/{id}', [UserController::class, 'image'])->name('user.image');
    Route:: get('/myblog', [UserController::class, 'myblog'])->name('user.myblog');
    Route:: get('/add_blog', [UserController::class, 'add_blog'])->name('user.add_blog');
    Route:: get('/show_blog/{id}', [UserController::class, 'show_blog'])->name('user.show_blog');
    Route:: put('/update_blog/{id}', [UserController::class, 'update_blog'])->name('user.update_blog');
    Route:: get('/delete_blog/{id}', [UserController::class, 'delete_blog'])->name('user.delete_blog');
    Route:: post('save_blog', [UserController::class, 'save_blog'])->name('user.save_blog');
    Route:: put('/update_info/{id}', [UserController::class, 'update_info'])->name('user.update_info');
    Route:: put('/update_pass/{id}', [UserController::class, 'update_pass'])->name('user.update_pass');

    //Admin
    Route::group(['middleware' => ['adminzone']],function () {
        Route:: get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route:: get('/dashboard/profil', [AdminController::class, 'profil'])->name('admin.profil');
        Route:: get('/dashboard/list_user', [AdminController::class, 'list1'])->name('admin.list1');
        Route:: get('/dashboard/list_personal', [AdminController::class, 'list2'])->name('admin.list2');
        Route:: get('/dashboard/list_admin', [AdminController::class, 'list3'])->name('admin.list3');
        Route:: get('/dashboard/blog', [AdminController::class, 'blog'])->name('admin.blog');
        Route:: get('/dashboard/contacts', [AdminController::class, 'contact'])->name('admin.contact');
        Route:: get('/dashboard/rating', [AdminController::class, 'rating'])->name('admin.rating');

        
        Route:: put('/dashboard/image/{id}', [AdminController::class, 'image'])->name('admin.image');
        Route:: put('/dashboard/update1/{id}', [AdminController::class, 'update1'])->name('admin.update1');
        Route:: put('/dashboard/update2/{id}', [AdminController::class, 'update2'])->name('admin.update2');
        Route:: post('/dashboard/add_personal', [AdminController::class, 'add_personal'])->name('admin.add_personal');
        Route:: put('/dashboard/update_personal/{id}', [AdminController::class, 'update_personal'])->name('admin.update_personal');
        Route:: post('/dashboard/add_admin', [AdminController::class, 'add_admin'])->name('admin.add_admin');
        Route:: put('/dashboard/update_admin/{id}', [AdminController::class, 'update_admin'])->name('admin.update_admin');
        Route:: get('/dashboard/lock/{id}', [AdminController::class, 'lock'])->name('admin.lock');

        Route:: get('dashboard/add_blog', [AdminController::class, 'add_blog'])->name('admin.add_blog');
        Route:: get('dashboard/detail_blog/{id}', [AdminController::class, 'detail_blog'])->name('admin.detail_blog');
        Route:: get('dashboard/show_blog/{id}', [AdminController::class, 'show_blog'])->name('admin.show_blog');
        Route:: put('dashboard/update_blog/{id}', [AdminController::class, 'update_blog'])->name('admin.update_blog');
        Route:: get('dashboard/lock_blog/{id}', [AdminController::class, 'lock_blog'])->name('admin.lock_blog');
        Route:: get('dashboard/visible/{id}', [AdminController::class, 'visible'])->name('admin.visible');
        Route:: post('dashboard/save_blog', [AdminController::class, 'save_blog'])->name('admin.save_blog');

        
        
    });

});

        
//AuthController
Route:: get('/login', [AuthController::class, 'login'])->name('login');
Route:: get('/register', [AuthController::class, 'register'])->name('register');
Route:: post('/save', [AuthController::class, 'save'])->name('auth.save');
Route:: post('/check', [AuthController::class, 'check'])->name('auth.check');
Route:: get('/logout', [AuthController::class, 'logout'])->name('logout');

