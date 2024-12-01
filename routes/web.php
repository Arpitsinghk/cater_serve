<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventImageController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\MenusbarController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileContorller;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AttendanceController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/services',[FrontendController::class,'services'])->name('services');
Route::get('/events', [FrontendController::class, 'events'])->name('events');
Route::get('/menu', [FrontendController::class, 'menu'])->name('menu');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/book', [FrontendController::class, 'book'])->name('book');
Route::get('/team', [FrontendController::class, 'team'])->name('team');
Route::get('/testimonial', [FrontendController::class, 'testimonial'])->name('testimonial');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');



Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    // Route::get('/home', 'home')->name('home');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [UserController::class, 'index'])->name('user.home');
    Route::get('/user/profile',[ProfileContorller::class,'user_index'])->name('user.profile');
    Route::put('/user/profile/{id}', [ProfileContorller::class, 'user_update'])->name('user.profile.update');
    Route::get('/user/password', [ProfileContorller::class, 'user_password'])->name('user.password');
    Route::put('/user/password/{id}', [ProfileContorller::class, 'changePassword'])->name('user.update.password');

});


Route::middleware(['auth', 'user-access:admin'])->group(function () {
   Route::get('/admin/home',[LoginRegisterController::class,'home'])->name('admin.home');
    Route::get('/admin/user',[UserController::class,'index'])->name('user.admin');
    Route::resource('user_crud', UserController::class);
    Route::get('/admin/teams',[TeamController::class, 'index'])->name('teams.admin');
    Route::resource('teams_crud', TeamController::class);
    Route::get('/admin/service',[ServiceController::class, 'index'])->name('service.admin');
    Route::resource('service_crud', ServiceController::class);
    Route::get('/admin/Event/Category',[EventController::class, 'index'])->name('event_category.admin');
    Route::resource('event_category_crud', EventController::class);
    Route::get('/admin/Event/Image',[EventImageController::class, 'index'])->name('event_image.admin');
    Route::resource('event_image_crud', EventImageController::class);
    Route::get('/admin/Menus',[MenusController::class, 'index'])->name('menus.admin');
    Route::resource('menus_crud', MenusController::class);
    Route::get('/admin/Menusbar',[MenusbarController::class, 'index'])->name('menus_bar.admin');
    Route::resource('menusbar_crud', MenusbarController::class);
    Route::get('/admin/Setting',[SettingController::class, 'index'])->name('setting.admin');
    Route::resource('setting_crud', controller: SettingController::class);
    Route::get('/admin/Blog',[BlogController::class, 'index'])->name('blog.admin');
    Route::resource('blog_crud', controller: BlogController::class);
    Route::get('/admin/booking', [BookingController::class, 'index'])->name('booking.admin');
    Route::post('/admin/bookings/{id}/accept', [BookingController::class, 'accept'])->name('bookings.accept');
    Route::post('/admin/bookings/{id}/reject', [BookingController::class, 'reject'])->name('bookings.reject');

    Route::get('/admin/profile',[ProfileContorller::class,'index'])->name('admin.profile');
    Route::put('/profile/{id}', [ProfileContorller::class, 'update'])->name('profile.update');
    Route::get('/admin/password/', [ProfileContorller::class, 'admin_update'])->name('admin.password');
    Route::put('admin/password/update/{id}', [ProfileContorller::class, 'admin_changePassword'])->name('admin.update.password');

    Route::get('/admin/businessetting',[SettingController::class,'setting'])->name('admin.bsetting');
    Route::put('admin/updatesetting/{id}', [SettingController::class, 'settingupdate'])->name('setting.update');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/attendance/generate/{studentId}', [AttendanceController::class, 'generateQrCode']);

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/attendance/generate/{studentId}', [AttendanceController::class, 'generateQrCode']);
    Route::get('/attendance/check-in/{barcode}', [AttendanceController::class, 'checkIn']);
});
