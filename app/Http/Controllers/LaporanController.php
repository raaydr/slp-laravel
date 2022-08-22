<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biodata;
use App\Models\seleksiPertama;
use App\Models\Penilaian;
use App\Models\Control;
use App\Models\Antrian;
use App\Models\Peserta;
use App\Models\Fasil;
use App\Models\Blog;
use App\Models\FasilRecord;
use App\Models\Quest;
use App\Models\Target;
use App\Models\Laporan;
use App\Models\Dokumentasi;
use App\Models\DokumentasiPembayaran;
use App\Models\Absensi;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Auth;
use PDF;
use Image;
use Redirect;
use DataTables;
use DateTime;
use Carbon\Carbon;



class LaporanController extends Controller
{
    public function PembuatanLaporan(Request $request)
    {
        $title = 'Pembuatan Laporan Tugas';
        $gen = DB::table('control')
            ->where('nama', 'gen')
            ->value('integer');
        $data = Laporan::where('status', 1)->orderBy('created_at', 'ASC')->get();
            if($request->ajax()){
    
                return datatables()->of($data)
                    ->addIndexColumn()
                    ->addColumn('Tanggal', function($row){
                        
                        $tanggal_mulai = $row->tanggal_kegiatan;
                        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');

                        return $tanggal_mulai;
                        
                    })
                    ->addColumn('action', function($row){
                        $detail = route('admin.DetailLaporan', $row->id);
                        $id = $row->id;
                        $b = '
                        <a class="btn btn-primary btn-sm" href='.$detail.'>
                        <i class="fas fa-folder"></i>detail</a>';
                        $actionBtn = $b.' 
                            <a id="hapus" data-toggle="modal" data-target="#modal-danger" class="btn btn-danger btn-sm">Hapus</a></dl>
                                                            <div class="modal fade" id="modal-danger">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Penolakan</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">    
                                                                                <p>Apa anda yakin ingin menghapus Laporan Tugas ini ?</p>
                                                                                <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteItem">Delete</a>
                                                                                </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->';
                        return $actionBtn;
                    })->rawColumns(['Tanggal','action'])
                    ->make(true);
            }
        
        return view('admin.pembuatanLaporan');
    }

    public function AddLaporan(Request $request){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'required|string|max:255',
            'date' => 'required|date',
            'time_start' => 'required',
            'time_end' => 'required',
            'tipe_kegiatan' => 'required|string',
            'tempat' => 'required',
            'guest' => 'required',
            
            
            

        ],

        $messages = 
        [
            'judul.required' => 'Judul tidak boleh kosong!',
            'date.required' => 'tanggal kegiatan tidak boleh kosong !',
            'tipe_kegiatan.required' => 'Tipe Kegiatan tugas tidak boleh kosong',
            'time_start.required' => 'Isi jam dimulai acara tidak boleh kosong',
            'time_end.required' => 'Isi jam berakhir acara tidak boleh kosong',
            
            'guest.required' => 'Pengisi atau Gueststar tidak boleh kosong!',
            'tempat.required' => 'Tempat tidak boleh kosong!',
            
            


        ]);     

        if($validator->fails())
        {
            return response()->json(['status'=>0, 'msg'=>'periksa input','error'=>$validator->errors()->all()]);
        }
    
        $gen = DB::table('control')
        ->where('nama', 'gen')
        ->value('integer');
        //Laporan
        $laporan = new Laporan;
        $laporan->judul = $request->judul;
        $laporan->tanggal_kegiatan = $request->date;
        $laporan->tipe_kegiatan = $request->tipe_kegiatan;
        $laporan->gen = $gen;
        $laporan->time_start = $request->time_start;
        $laporan->time_end = $request->time_end;
        $laporan->guest = $request->guest;
        $laporan->tempat = $request->tempat;
        $laporan->status = 1;
        $laporan->save();

        //Absensi

        $peserta = User::where('gen', $laporan->gen)->where('level', 1)->orWhere('level', 4)->get();
        $jumlah_peserta = count($peserta);
        for ($i = 0; $i <= $jumlah_peserta - 1; $i++) {
            
            $level = $peserta[$i]['level'];
            $id = $peserta[$i]['id'];
            $absensi = new Absensi;
            if(($level)== 1){
                $nama = DB::table('biodata')
                        ->where('user_id', $id)
                        ->value('nama');
                $absensi->nama = $nama;
                
                
            }else{
                $nama = Peserta::where('user_id', $id)->value('nama');
                $grup = Peserta::where('user_id', $id)->value('grup');
                
                $absensi->nama = $nama;
                $absensi->grup = $grup;
            }
            $absensi->absen = 0;
            $absensi->laporan_id = $laporan->id;
            $absensi->user_id = $id;
            $absensi->save();
        }
        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }
    public function DeleteLaporan($id)
    {
        Laporan::where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Laporan ']);
        
    }

    public function DetailLaporan($id)
    {
        $title = 'Detail Laporan ';
        $laporan = Laporan::where('id', $id)->first();
        $tanggal_mulai = $laporan->tanggal_kegiatan;
        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
        $dokumentasi = Dokumentasi::where('laporan_id', $id)->where('status', 1)->get();
        $mulai=date_format($laporan->time_start, 'G:i');
        $akhir=date_format($laporan->time_end, 'G:i');
        //dd($dokumentasi);
        return view('admin.detailLaporan', compact('title','laporan','tanggal_mulai','mulai','akhir','dokumentasi'));
    }

    public function EditLaporanForm($id){
        $title = 'edit Laporan ';
        $laporan = Laporan::where('id', $id)->first();
        $tanggal_mulai = $laporan->tanggal_kegiatan;
        $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
        
        $mulai=date_format($laporan->time_start, 'G:i');
        $akhir=date_format($laporan->time_end, 'G:i');
        return view('admin.editLaporan', compact('title','laporan','tanggal_mulai','mulai','akhir'));
    }
    public function EditLaporan(Request $request, $id){
        $validator = Validator::make($request->all(), 
        [   
            'judul' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'time_start' => 'nullable',
            'time_end' => 'nullable',
            'tipe_kegiatan' => 'string',
            'tempat' => 'nullable',
            'guest' => 'nullable|string',
            
            
            

        ],

        $messages = 
        [
        
            
            


        ]);    
  
        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();  
        }

        $laporanBaru = array();
        
        if($request->judul != null){
            $judul = $request->judul;
            $laporanBaru['judul'] = $judul;
        }
        if($request->date != null){
            $date = $request->date;
            $laporanBaru['tanggal_kegiatan'] = $date;
        }
        if($request->time_start!= null){
            $time_start =  $request->time_start;
            $laporanBaru['time_start'] = $time_start;
        }
        if($request->time_end!= null){
            $time_end = $request->time_end;
            $laporanBaru['time_end'] = $time_end;
        }
        if($request->tipe_kegiatan != null){
            $tipe_kegiatan = $request->tipe_kegiatan;
            $laporanBaru['tipe_kegiatan'] = $tipe_kegiatan;
        }
        if($request->tempat != null){
            $tempat = $request->tempat;
            $laporanBaru['tempat'] = $tempat;
        }
        if($request->guest != null){
            $guest = $request->guest;
            $laporanBaru['guest'] = $guest;
        }
        
        $laporanBaru['updated_at'] = now();

        Laporan::where('id', $id )->update($laporanBaru);

        return Redirect::back()->with('pesan','Laporan Baru Tersimpan');;
        
    }

    public function noteLaporan (Request $request,$id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'keterangan' => 'required',
                

                

            ],

            $messages = [
                
                'keterangan.required' => 'tolong dilengkapi',
                
               

            ]
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $detail=$request->keterangan;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        Laporan::where('id',$id)->update([
                
            'keterangan' => $detail,
            'updated_at'=> now(),
        ]);
            return Redirect::back()->with('pesan','berhasil');
    

    }

    public function dokumentasiKegiatanLaporan(Request $request,$id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg,pdf|max:5120'
            ],
        
            $messages = [
                'file.required' => 'foto tidak boleh kosong!',
                'file.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png, pdf.',
                'file.max' => 'Ukuran file terlalu besar, maksimal file 5Mb !',
            ]
        );
        
        if ($validator->fails()) {
            $error = $validator->errors()->all();
            
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        $namaFile = Laporan::where('id', $id)->value('judul');
        $image = $request->file('file');
        $imageThumbnail = Image::make($image);
        $imageName = $image->getClientOriginalName();
        $namaFile = $namaFile.'_'.time();
        $namaFileRILL = $namaFile.'.'.$image->getClientOriginalExtension();
                $namaFileRILL = preg_replace("/\s+/", "", $namaFileRILL);
                $destinationPath = public_path().'/dokumentasi-kegiatan/' ;
                $image->move($destinationPath,$namaFileRILL);


                
                $imageThumbnail->resize(255,255, function($constraint)
                {
                    $constraint->aspectRatio();
                });
                $namaFileFake = $namaFile.'_thumbnail'.'.'.$image->getClientOriginalExtension();
                $namaFileFake = preg_replace("/\s+/", "", $namaFileFake);
                $destinationPathFake = public_path().'/dokumentasi-kegiatan-thumbnail/' ;
                $imageThumbnail->save($destinationPathFake . $namaFileFake, 30);
                
        
                $dokumentasi = new Dokumentasi;
                $dokumentasi->url_foto = $namaFileRILL;
                $dokumentasi->url_thumbnail = $namaFileFake;
                $dokumentasi->laporan_id = $id;
                $dokumentasi->status = 1;
                $dokumentasi->save();  

        
        return response()->json(['success'=>'Berhasil Upload Foto '.$imageName, 'msg'=>$dokumentasi->id]);
        
    }

    public function dokumentasiPembayaran(Request $request,$id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'keterangan' => 'required',
                'pembayaran' => 'required',
                'url_foto' => 'required|mimes:jpeg,png,jpg,pdf|max:5120',
            ],

            $messages = [
                'url_foto.required' => 'foto tidak boleh kosong!',
                'url_foto.image' => 'Format file tidak mendukung! Gunakan jpg, jpeg, png,pdf.',
                'url_foto.max' => 'Ukuran file terlalu besar, maksimal file 5Mb !',
            ]
        );

        if ($validator->fails()) {
            //return Redirect::back()->with('pesan','salah');
            return back()->withErrors($validator)->withInput();
        }
        $laporan = new DokumentasiPembayaran;
        $detail=$request->keterangan;
        $dom = new \DomDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $detail = $dom->saveHTML();
        $laporan->laporan_id = $id;
        $laporan->status = 1;
        $laporan->keterangan = $detail;
        $pembayaran = $request->pembayaran;
        $harga_str = preg_replace("/[^0-9]/", "", $pembayaran);
        $pembayaran = (int) $harga_str;
        $laporan->pembayaran = $pembayaran;
        if ($gambar = $request->hasFile('url_foto')) {
                $image = $request->file('url_foto');
                $namaFile = Laporan::where('id', $id)->value('judul');
                $namaFile = $namaFile.'_'.time().'.'.$image->getClientOriginalExtension() ;
                $fileName = preg_replace("/\s+/", "", $namaFile);
                $destinationPath = public_path().'/dokumentasi-pembayaran/' ;
                $image->move($destinationPath,$fileName);
                $laporan->url_foto = $fileName;
                
                $laporan->save();  
                
        }

        

        return response()->json(['status'=>1,'success'=>'Item saved successfully.']);
    }

    public function tabelDokumentasiPembayaran(Request $request, $id)
    {
        $data = DokumentasiPembayaran::where('laporan_id', $id)->where('status', 1)->get();
        if($request->ajax()){
    
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('Pembayaran', function($row){
                    $pembayaran = $row->pembayaran;
                    $pembayaran = number_format($pembayaran, 0, '', '.');
                    
                        return $pembayaran;
                })
                ->addColumn('Keterangan', function($row){
                    $keterangan =  $row->keterangan ;

                    return $keterangan;

                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $b = $row->url_foto;
                    $a = $row->judul;
                    $asset= "/dokumentasi-pembayaran/";
                    $detail=  $asset.$b;
                    $image = '<a class="btn btn-outline-primary m-1" href='.$detail.' data-toggle="lightbox" data-title='.$a.'>
                    detail
                    </a>';
                    $actionBtn =$image.' 
                        <a id="hapus" data-toggle="modal" data-target="#modal-danger" class="btn btn-outline-danger">Hapus</a></dl>
                                                        <div class="modal fade" id="modal-danger">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-danger">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Penolakan</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">    
                                                                            <p>Apa anda yakin ingin menghapus Pembayaran ini ?</p>
                                                                            <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteItem">Delete</a>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->';
                    return $actionBtn;
                })->rawColumns(['Pembayaran','Keterangan','action'])
                ->make(true);
        }
        
    }

    public function tabelDokumentasiKegiatan(Request $request, $id)
    {
        $data = Dokumentasi::where('laporan_id', $id)->where('status', 1)->orderBy('created_at', 'DESC')->get();
        if($request->ajax()){
    
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('image', function($row){
                    $b = $row->url_foto;
                    $c = $row->url_thumbnail;
                    $a = $row->judul;
                    $asset= "/dokumentasi-kegiatan/";
                    $detail=  $asset.$b;
                    $assetThumbnail= "/dokumentasi-kegiatan-thumbnail/";
                    $thumbnail=  $assetThumbnail.$c;
                    $id = $row->id;
                    $image = '<a href='.$detail.' data-toggle="lightbox" data-title='.$a.'>
                    <img src='.$thumbnail.' class="img-fluid" alt="white sample"/>
                    </a>';
                    
                        return $image;
                })
                ->addColumn('action', function($row){
                    $id = $row->id;
                    $actionBtn =' 
                        <a id="hapus" data-toggle="modal" data-target="#upload-foto" class="btn btn-outline-danger">Hapus</a></dl>
                                                        <div class="modal fade" id="upload-foto">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content bg-danger">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Penolakan</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">    
                                                                            <p>Apa anda yakin ingin menghapus Dokumentasi ini ?</p>
                                                                            <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-dismiss="modal" data-original-title="Delete" class="btn btn-outline-light deleteFoto">Delete</a>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->';
                    return $actionBtn;
                })->rawColumns(['image','action'])
                ->make(true);
        }
        
    }
    public function DeleteDokumentasiPembayaran($id)
    {
        $file = DokumentasiPembayaran::where('id', $id)->value('url_foto');
        File::delete('dokumentasi-pembayaran/' . $file);
        DokumentasiPembayaran::where('id', $id)->update([
            'url_foto' => "kosong",
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Bukti Pembayaran ']);
        
    }
    public function DeleteDokumentasiKegiatan($id)
    {
        
        $file = Dokumentasi::where('id', $id)->value('url_foto');
        $thumbnail = Dokumentasi::where('id', $id)->value('url_thumbnail');
        File::delete('dokumentasi-kegiatan/' . $file);
        File::delete('dokumentasi-kegiatan-thumbnail/' . $thumbnail);
        Dokumentasi::where('id', $id)->update([
            'url_foto' => "kosong",
            'url_thumbnail' => "kosong",
            'status' => 0,
            'updated_at' => now(),
            ]
        );
        return response()->json(['success'=>'Hapus Dokumentasi ']);
        
    }

    public function downloadLaporan($id)
{
	$data = Laporan::where('gen', 2)->where('status', 1)->orderBy('created_at', 'ASC')->get();
    $logo = "/shop/assets/images/logo.png";
    $laporan = Laporan::where('id', $id)->first();
    $tanggal_mulai = $laporan->tanggal_kegiatan;
    $tanggal_mulai=Carbon::parse($tanggal_mulai)->isoFormat('D MMMM Y');
    
    
    

    $pembayaran = DokumentasiPembayaran::where('laporan_id', $id)->where('status', 1)->get();
    $jumlah_pembayaran = count($pembayaran);
    $total_pembayaran = 0;
            for ($i = 0; $i <= $jumlah_pembayaran-1; $i++) {
                $jumlah = $pembayaran[$i]['pembayaran'];
                $total_pembayaran = $total_pembayaran + $jumlah;

                $pembayaran[$i]['pembayaran'] = number_format($jumlah, 0, '', '.');

                $foto = $pembayaran[$i]['url_foto'];
                $asset= "/dokumentasi-pembayaran/";
                $detail=  $asset.$foto;
                $pembayaran[$i]['url_foto']= $detail;

                
            }

    $dokumentasi = Dokumentasi::where('laporan_id', $id)->where('status', 1)->get();
    $jumlah_dokumentasi = count($dokumentasi);
    
            for ($i = 0; $i <= $jumlah_dokumentasi-1; $i++) {                
                $foto = $dokumentasi[$i]['url_foto'];
                $asset= "/dokumentasi-kegiatan/";
                $detail=  $asset.$foto;
                $dokumentasi[$i]['url_foto']= $detail;

                
            }

    $hadir = Absensi::where('laporan_id', $id)->where('absen', 1)->get();
    $jumlah_hadir = count($hadir);

    $absensi = Absensi::where('laporan_id', $id)->get();
    $jumlah_absensi = count($absensi);
    
            for ($i = 0; $i <= $jumlah_absensi-1; $i++) {                
                $absen = $absensi[$i]['absen'];
                switch ($absen) {
                    case '0':
                        $absensi[$i]['absen'] = "Belum Hadir";
                        break;
                    case '1':
                        $absensi[$i]['absen'] = "Hadir";
                        break;
                    case '2':
                        $absensi[$i]['absen'] = "Tidak Hadir";
                        break;                               
                        default:
                        echo "SLP INDONESIA";
                        break;
                }
                
            }

    $total_pembayaran= number_format($total_pembayaran, 0, '', '.');
    $mulai=date_format($laporan->time_start, 'G:i');
    $akhir=date_format($laporan->time_end, 'G:i');
	$pdf = PDF::loadview('admin.downloadLaporan',['data'=>$data,'logo'=>$logo,'laporan'=>$laporan
    ,'tanggal_mulai'=>$tanggal_mulai
    ,'mulai'=>$mulai
    ,'akhir'=>$akhir
    ,'jumlah_hadir'=>$jumlah_hadir
    ,'total_pembayaran'=>$total_pembayaran
    ,'pembayaran'=>$pembayaran
    ,'dokumentasi'=>$dokumentasi
    ,'absensi'=>$absensi]);
	return $pdf->stream();
    //return view('admin.downloadLaporan', compact('data','logo','laporan','tanggal_mulai','mulai','akhir','dokumentasi'));
    
}

}
