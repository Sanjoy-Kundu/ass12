<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TicketSellController;
use App\Http\Controllers\TimeSheduleController;
use App\Http\Controllers\TripController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',                                    [BackendController::class, 'index'])->name('dashboard');



//bus section 
Route::get('buses/bus/lists',                      [BusController::class, 'index'])->name('buses.bus.lists');
Route::get('/buses/busRegistration',               [BusController::class, 'create'])->name('buses.busRegistration');
Route::post('/buses/bus/store',                    [BusController::class, 'store'])->name('buses.bus.store');
Route::get('/buses/bus/{bus_id}',                  [BusController::class, 'show'])->name('buses.bus');
Route::get('buses/bus/edit/{bus_edit_id}',         [BusController::class, 'edit'])->name('buses.bus.edit');
Route::post('/buses/bus/update/{bus_update_id}',   [BusController::class, 'update'])->name('buses.bus.update');



// city section 
Route::get('/cities/city/lists',                  [CityController::class, 'index'])->name('cities.city.lists');
Route::get('/cities/cityRegistration',            [CityController::class, 'create'])->name('cities.cityRegistration');
Route::post('/cities/city/store',                 [CityController::class, 'store'])->name('cities.city.store');
Route::get('/cities/city/view/{city_view_id}',    [CityController::class, 'show'])->name('cities.city.view');
Route::get('/cities/city/edit/{city_edit_id}',    [CityController::class, 'edit'])->name('cities.city.edit');
Route::post('/cities/city/update/{city_update_id}',[CityController::class, 'update'])->name('cities.city.update');








//driver section 
Route::get('/drivers/driver/lists',                      [DriverController::class, 'index'])->name('drivers.driver.lists');
Route::get('/drivers/driverRegistration',                [DriverController::class, 'create'])->name('drivers.driverRegistration');
Route::post('/drivers/driver/store',                     [DriverController::class, 'store'])->name('drivers.driver.store');
Route::get('/drivers/driver/view/{driver_view_id}',      [DriverController::class, 'show'])->name('drivers.driver.view');
Route::post('/drivers/driver/update/{driver_update_id}', [DriverController::class, 'update'])->name('drivers.driver.update');












//trip section 
Route::get('/trips/lists',                         [TripController::class, 'index'])->name('trips.lists');
Route::get('/trips/tripRegistration',              [TripController::class, 'create'])->name('trips.tripRegistration');
Route::post('/trips/trip/store',                   [TripController::class, 'store'])->name('trips.trip.store');




Route::get('/passenger/lists',                    [TicketSellController::class, 'index'])->name('passenger.lists');
Route::get('trip/Ticket/sell/{ticket_sell_id}',    [TicketSellController::class, 'create'])->name('trip.Ticket.sell');
Route::post('trip/Ticket/sell/store/',    [TicketSellController::class, 'store'])->name('trip.Ticket.sell.store');






//time shedule
Route::get('/timeShedules/lists',                   [TimeSheduleController::class, 'index'])->name('timeShedules.lists');
Route::get('/timeShedules/timeSheduleRegistration', [TimeSheduleController::class, 'create'])->name('timeShedules.timeSheduleRegistration');
Route::post('/timeShedules/store',                  [TimeSheduleController::class, 'store'])->name('timeShedules.store');
Route::get('/timeShedules/view/{time_view_id}',     [TimeSheduleController::class, 'show'])->name('timeShedules.view');
