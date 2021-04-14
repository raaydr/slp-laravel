<?php

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





Auth::routes();
Route::get('/home', function () {
    return view('compro');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/a', [App\Http\Controllers\AdminController::class, 'coba']);
Route::get('/b', [App\Http\Controllers\PendaftarController::class, 'insertSeleksi1']);
// ROUTES ADMIN
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/coba', 'AdminController@coba');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard/userProfile/{user_id}', 'AdminController@userProfile');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/seleksi-pertama', 'AdminController@seleksi1');
    });
});

Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard/userProfile/lulus/{user_id}', 'AdminController@seleksi1_lulus')->name('admin.seleksi1.lulus');
    });
});

Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard/userProfile/gagal/{user_id}', 'AdminController@seleksi1_gagal')->name('admin.seleksi1.gagal');
    });
});

Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard/userProfile/lulusTahap2/{user_id}', 'AdminController@seleksi2_lulus')->name('admin.seleksi2.lulus');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard/userProfile/gagalTahap2/{user_id}', 'AdminController@seleksi2_gagal')->name('admin.seleksi2.gagal');
    });
});


// ROUTES PENDAFTAR
Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::get('/dashboard', 'PendaftarController@index')->name('pendaftar.dashboard');

	});
});
Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::get('/seleksi-pertama', 'PendaftarController@seleksi1')->name('pendaftar.seleksi1');

	});
});

Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::post('/upload-seleksi-pertama', 'PendaftarController@seleksiPertama')->name('pendaftar.upload.seleksi1');

	});
});