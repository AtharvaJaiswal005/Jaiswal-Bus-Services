<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserController;
use App\Mail\ReservednMail;
use App\Http\Controller\Salesanalyticscontrollers;
use App\Http\Controllers\Salesanalyticscontroller;
use App\Http\Controllers\AvaController;
use App\Http\Controllers\avatarcontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 



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
// Route::get('/email', function(){
//     $data = [
//         'bus_name' => 'Bus1',
//         'total_price' => '1600',
//         'date_time' => '2021-09-01 13:12',
//         'no_of_seats' =>1,
//         'seats_no' => 23,
//     ];
//     return new ReservednMail($data);
// });
Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Bus Management
Route::get('/bus-management',[BusController::class, 'index'])->name('bus_mgt');
Route::post('/bus-reg',[BusController::class, 'bus_reg'])->name('bus_reg');
Route::post('/bus-update',[BusController::class, 'update_reg'])->name('update_reg');
Route::post('/bus-deactive',[BusController::class, 'deactive_bus'])->name('deactive_bus');

//Route Management
Route::get('/route-management', [RouteController::class, 'index']);
Route::post('/add-route',[RouteController::class, 'add_route'])->name('add_route');

//route and pricing
Route::get('/route-city-price', [RouteController::class, 'route_price'])->name('route_price');
Route::post('/route-new-city-price-add', [RouteController::class, 'add_price'])->name('add_price');
Route::post('/route-get-data', [RouteController::class, 'get_all_route_data'])->name('get_all_route_data');
Route::post('/route-delete', [RouteController::class, 'delete_city_route_price'])->name('delete_city_route_price');


//City Management
Route::get('/city-management', [CityController::class, 'index']);
Route::post('/city-add', [CityController::class, 'city_add'])->name('city_add');
Route::post('/city-delete', [CityController::class, 'delete_city'])->name('delete_city');
Route::post('/city-edit', [CityController::class, 'edit_city'])->name('edit_city');

//Reservation Management
Route::get('/reservation-management', [ AdminController::class, 'reservation_pending'])->name('res_pending');
Route::get('/approved-reservations',[ AdminController::class, 'res_approved'])->name('res_approved');
Route::get('/rejected-reservations',[ AdminController::class, 'res_rejected'])->name('res_rejected');

//reservatiom Approve/reject
Route::post('/res-reject', [AdminController::class, 'reject_res'])->name('reject_res');
Route::post('/res-approve', [AdminController::class, 'approve_res'])->name('approve_res');
Route::post('/res-reverse', [AdminController::class, 'reverse_res'])->name('reverse_res');

//client_search
Route::post('/', [ReservationController::class, 'search_route'])->name('search_route');

//logout
Route::get('/logout', function () { Auth::logout(); return redirect('/');})->middleware('auth');

//Landing
Route::get('/', [ReservationController::class, 'index'])->name('landing');

//user new reservation
Route::get('/new-reservation', [UserController::class, 'new_reservation'])->name('new_reservation');
Route::post('/reserve-bus', [RouteController::class, 'reserve_bus'])->name('reserve_bus');
Route::get('/my-reservation', [ReservationController::class, 'my_reservation'])->name('my_reservation');

//temp
Route::post('/tem-res', [ReservationController::class, 'temp_data'])->name('temp_data');

//salesanalyticscontroller
Route::get('/dashboard', [Salesanalyticscontroller::class, 'chart'])->name('new_chart');

//avatar
Route::get('/update_ava', [AvaController::class, 'avatar'])->name('avatar');
Route::post('/update_com', [AvaController::class, 'avatar_com'])->name('avatar_com');
