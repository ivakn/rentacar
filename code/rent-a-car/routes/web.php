<?php
use App\CarFree;
use App\Car;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

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

Route::get('/', 'PagesController@index'
);
Route::get('/about', 'PagesController@about'
);
Auth::routes();
Route::resource('cars','CarController');
Route::resource('reservations','ReservationsController');
Route::pattern('locale', '[1-200]');

Route::get('cars/{id}/reservations', function($id){
    $car=Car::find($id);
    $pickUp=Session::get('pickUpDate');
    $dropOff=Session::get('dropOffDate');
    $id = Auth::user()->id;
    $currentuser = User::find($id);
       return view('pages.reserve')->with(['car'=>$car, 'pickUp'=>$pickUp,'dropOff'=>$dropOff,
       'user'=>$currentuser]);  
});



Route::any('/store','PagesController@store')->name('store_dates');
Route::any('/confirm/{id}','PagesController@confirm')->name('confirm');

Route::get('/home', 'HomeController@index')->name('home');


Route::any('/search','PagesController@search'
);