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
	Route::get('/seleksi-challenge', 'AdminController@challenge')->name('admin.challenge');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/rank-challenge', 'AdminController@rank_challenge')->name('admin.challenge.rank');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/antrian-interview', 'AdminController@antrian_interview')->name('admin.interview.antrian');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/dashboard/interview/hadir/{user_id}', 'AdminController@interview_hadir')->name('admin.interview.hadir');
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
	Route::get('/tahap-challenge/gagal/{user_id}/{r}', 'AdminController@challenge_gagal')->name('admin.challenge.gagal');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/tahap-challenge/lulus/{user_id}/{nama}', 'AdminController@challenge_lulus')->name('admin.challenge.lulus');
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
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::post('/penilaian_seleksichallenge', 'AdminController@challenge_penilaian')->name('admin.challenge.penilaian');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::post('/editpenilaian_seleksichallenge', 'AdminController@challenge_editpenilaian')->name('admin.challenge.editpenilaian');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/challenge/all-gagal', 'AdminController@allGagal')->name('admin.all.gagal');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/challenge/generate-antrian', 'AdminController@generateAntrian')->name('admin.generate.antrian');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/challenge/all-gagaldaftar', 'AdminController@allDaftarUlang')->name('admin.all.daftarulang');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::post('/penutupan-pendaftaran', 'AdminController@tutupPendaftaran')->name('admin.tutup.pendaftaran');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::post('/antrian-note', 'AdminController@antrianNote')->name('admin.antrian.note');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/seleksi/interview/{user_id}/{r}', 'AdminController@seleksi3')->name('admin.seleksi.interview');
    });
});
Route::group(['middleware' => 'check-permission:admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
	Route::get('/seleksi/stadium-general/{user_id}/{r}', 'AdminController@stadiumgeneral')->name('admin.stadiumgeneral');
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
Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::get('/seleksi-kedua', 'PendaftarController@seleksi2')->name('pendaftar.seleksi2');

    });
});
Route::group(['middleware' => 'check-permission:pendaftar'], function () {
    Route::group(['prefix' => 'pendaftar'], function () {
	Route::post('/upload-tes-kepribadian', 'PendaftarController@uploadKepribadian')->name('pendaftar.kepribadian.pdf');

	});
});
// ROUTES Peserta
Route::group(['middleware' => 'check-permission:peserta'], function () {
    Route::group(['prefix' => 'peserta'], function () {
	Route::get('/pengumuman', 'PesertaController@index')->name('peserta.pengumuman');

	});
});