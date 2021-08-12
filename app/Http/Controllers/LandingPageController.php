<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class LandingPageController extends Controller
{
    //
    public function detailBlog($judul){
        $judul = str_replace('_', ' ', $judul);
        $blog = Blog::where('judul', $judul)->first();
        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        $tanggal = $blog->created_at;
        $tanggalbaru=Carbon::parse($tanggal)->isoFormat('D MMMM Y');
        return view('post',compact('blog','tanggalbaru'));
    }

    public function compro(){
        $blog = Blog::latest()->take(3)->get();
        return view('compro',compact('blog'));
    }
    

    public function loadMoreData(Request $request){
       if($request->ajax()){
           if($request->id > 0){
               $data = Blog::where('id','<',$request->id)
               ->where('publish',1)
               ->limit(6)
               ->get();
           }
           else{
            $data = Blog::where('publish',1)
            ->limit(6)
            ->get();
           }

           $output='';
           $last_id='';

           if(!$data->isEmpty()){
            foreach ($data as $row) {
                $judul = str_replace('_', ' ', $row->judul);
                $detail = route('admin.detailBlog',($judul));
                $blog = Blog::where('judul', $judul)->first();
                setlocale(LC_TIME, 'id_ID');
                Carbon::setLocale('id');
                $tanggal = $row->created_at;
                $tanggalbaru=Carbon::parse($tanggal)->isoFormat('D MMMM Y');
                $output .= '
                <div class="row">
         <div class="col-lg-12">
          <h3 class="text-info"><b>'.$row->judul.'</b></h3>
          <p>'.$row->awalan.'</p>
          <br />
          <div class="col-lg-6">
           <p><b>Publish Date - '.$tanggalbaru.'</b></p>
          </div>
          <div class="col-lg-6" align="right">
           <p><b><i>By - '.$row->nama.'</i></b></p>
          </div>
          <br />
          <hr />
         </div>         
        </div>
        ';
                $last_id = $row->id ;
               
            }
            $output .= '
            <div id="load_more">
             <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="' . $last_id . '" id="load_more_button">Load More</button>
     
            </div>
            ';
           }else{
            $output .= '
            <div id="load_more">
             <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
            </div>
            ';
           }
           echo $output;
       }
    }

    function load_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->id > 0)
      {
        $data = Blog::where('id','<',$request->id)
        ->where('publish',1)
        ->limit(3)
        ->get();
      }
      else
      {
        $data = Blog::where('publish',1)
        ->limit(3)
        ->get();
      }
      $output = '';
      $last_id = '';
      
      if(!$data->isEmpty())
      {
       foreach($data as $row)
       {
        $judul = str_replace('_', ' ', $row->judul);
                $detail = route('detailBlog',($judul));
                $blog = Blog::where('judul', $judul)->first();
                setlocale(LC_TIME, 'id_ID');
                Carbon::setLocale('id');
                $tanggal = $row->created_at;
                $tanggalbaru=Carbon::parse($tanggal)->isoFormat('D MMMM Y');
                $output .= '
            <div class="col-lg-4">
                <div class="portfolio-wrap">
                    <figure>
                        <div class="card flex-md-row mb-4 ">
                            <div class="card-body d-flex flex-column align-items-start">
              
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">'.$judul.'</a>
                                </h3>
                                <div class="mb-1 text-muted">'.$judul.'</div>
                                <p class="card-text mb-auto">'.$tanggalbaru.'</p>
                                <a href='.$detail.'>Continue reading</a>
                            </div>
                        </div>                  
                    </figure>
                </div>    
            </div>
                ';
        $last_id = $row->id;
       }
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       ';
      }
      else
      {
       $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="btn btn-info form-control">No Data Found</button>
       </div>
       ';
      }
      echo $output;
     }
    }
}
