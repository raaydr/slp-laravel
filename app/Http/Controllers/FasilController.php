<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;

class FasilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard Fasil';
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        
        
        return view('fasil.dashboard', compact('title', 'user'));
    }
}
