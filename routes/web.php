<?php

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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin', 'Admin\AdminController@index')->name('admin')->middleware('admin');
// Route::get('/staff', 'Staff\StaffController@index')->name('staff')->middleware('staff');
// Route::get('/manager', 'Manager\ManagerController@index')->name('manager')->middleware('manager');

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get('/', function () {
        return redirect()->guest('login');
    });

    Route::get('/home', function() {
        if (Auth::user()->role_id == 3) {
            $user['users'] = \App\User::all();
            return view('admin.home');
            
        } else {
            return view('staff.home');
        }
    });

});
