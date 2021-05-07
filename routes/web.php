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
Route::get('/program-beasiswa', function () {
    return view('compro');
});


    Route::group(['prefix' => 'pendaftar'], function () {
	Route::post('/daftar-ulang', 'PendaftarController@daftarUlang')->name('register.ulang');

	});

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
	Route::get('/coba', 'AdminController@coba')->name('admin.coba');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard/userProfile/{user_id}', 'AdminController@userProfile')->name('admin.userprofile');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/seleksi-eleminasi', 'AdminController@seleksi1')->name('admin.eliminasi');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/gagal-daftar', 'AdminController@seleksi2')->name('admin.gagaldaftar');
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
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::post('/penilaian_challenge', 'AdminController@penilaian')->name('admin.seleksi2.penilaian');
    });
});Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::post('/dashboard/userProfile/editpenilaian/{user_id}', 'AdminController@editpenilaian')->name('admin.seleksi2.editpenilaian');
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
	Route::get('/pengumuman', 'PendaftarController@pengumuman')->name('pendaftar.pengumuman');

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

Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::post('/edit-foto', 'PendaftarController@editfoto')->name('pendaftar.edit.foto');

	});
});
Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::get('/edit-biodata', 'PendaftarController@editbiodata')->name('pendaftar.edit.biodata');

	});
});
Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::post('/update-biodata', 'PendaftarController@updatebiodata')->name('pendaftar.update.biodata');

    });
});

Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::get('/ranking-challenge', 'PendaftarController@ranking')->name('pendaftar.ranking.challenge');

    });
});
