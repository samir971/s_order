<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use APP\Http\Controllers\UserController;

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

\Illuminate\Support\Facades\Auth::routes(['register' => false]);


// Custom Auth
Route::get('/login',[LoginController::class,'show_login_form'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/register',[LoginController::class,'show_signup_form'])->name('register');
Route::post('/register',[LoginController::class,'process_signup']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');



//Auth::routes();


Route::get('/test', [DashboardController::class, 'index'])->name('Admin-Panel');
//Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
//Route::get('/500', [DashboardController::class, 'serverError'])->name('404');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
//city
Route::get('/home/cities', [App\Http\Controllers\CityController::class, 'index'])->name('cities');
Route::get('/home/cities/create', [App\Http\Controllers\CityController::class, 'create'])->name('cities.create');
Route::post('/home/cities/store', [App\Http\Controllers\CityController::class, 'store'])->name('cities.store');
Route::get('/home/cities/{id}/areas', [App\Http\Controllers\CityController::class, 'show'])->name('cities.areas');
Route::get('/home/cities/{city}/edit', [App\Http\Controllers\CityController::class, 'edit'])->name('cities.edit');
Route::put('/home/cities/{city}', [App\Http\Controllers\CityController::class, 'update'])->name('cities.update');


//area
Route::get('/home/areas', [App\Http\Controllers\AreaController::class, 'index'])->name('areas');
Route::get('/home/areas/create', [App\Http\Controllers\AreaController::class, 'create'])->name('areas.create');
Route::post('/home/areas/store', [App\Http\Controllers\AreaController::class, 'store'])->name('areas.store');
Route::get('/home/areas/{area}/edit', [App\Http\Controllers\AreaController::class, 'edit'])->name('areas.edit');
Route::put('/home/areas/{area}', [App\Http\Controllers\AreaController::class, 'update'])->name('areas.update');

//monitor
Route::get('/home/monitors', [App\Http\Controllers\MonitorController::class, 'index'])->name('monitors');
Route::get('/home/monitors/create', [App\Http\Controllers\MonitorController::class, 'create'])->name('monitors.create');
Route::post('/home/monitors/store', [App\Http\Controllers\MonitorController::class, 'store'])->name('monitors.store');
Route::get('/home/monitors/{monitor}/edit', [App\Http\Controllers\MonitorController::class, 'edit'])->name('monitors.edit');
Route::put('/home/monitors/{monitor}', [App\Http\Controllers\MonitorController::class, 'update'])->name('monitors.update');

//delivery
Route::get('/home/deliveries', [App\Http\Controllers\DeliveryController::class, 'index'])->name('deliveries');
Route::get('/home/deliveries/create', [App\Http\Controllers\DeliveryController::class, 'create'])->name('deliveries.create');
Route::post('/home/deliveries/store', [App\Http\Controllers\DeliveryController::class, 'store'])->name('deliveries.store');
Route::get('/home/deliveries/{delivery}/edit', [App\Http\Controllers\DeliveryController::class, 'edit'])->name('deliveries.edit');
Route::put('/home/deliveries/{delivery}', [App\Http\Controllers\DeliveryController::class, 'update'])->name('deliveries.update');

//package
Route::get('/home/packages', [App\Http\Controllers\PackageController::class, 'index'])->name('packages');
Route::get('/home/packages/create', [App\Http\Controllers\PackageController::class, 'create'])->name('packages.create');
Route::post('/home/packages/store', [App\Http\Controllers\PackageController::class, 'store'])->name('packages.store');
Route::get('/home/packages/{id}/users', [App\Http\Controllers\PackageController::class, 'show'])->name('packages.users');
Route::get('/home/packages/{package}/edit', [App\Http\Controllers\PackageController::class, 'edit'])->name('packages.edit');
Route::put('/home/packages/{package}', [App\Http\Controllers\PackageController::class, 'update'])->name('packages.update');

//customer
Route::get('/home/customers', [App\Http\Controllers\UserController::class, 'index'])->name('customers');
Route::get('/home/customers/create', [App\Http\Controllers\UserController::class, 'create'])->name('customers.create');
Route::post('/home/customers/store', [App\Http\Controllers\UserController::class, 'store'])->name('customers.store');
Route::get('/home/customers/{id}/users', [App\Http\Controllers\UserController::class, 'show'])->name('customers.show');
Route::get('/home/customers/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('customers.edit');
Route::put('/home/customers/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('customers.update');

// WorkTime
Route::get('/home/worktimes', [App\Http\Controllers\WorkTimeController::class, 'index'])->name('worktimes.index');
Route::patch('/home/worktimes/update', [App\Http\Controllers\WorkTimeController::class, 'update'])->name('worktimes.update');
// Setting
Route::get('/home/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
Route::patch('/home/settings/update', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

//search
Route::get('home/users/search',[UserController::class,'search'])->name('user.search');




