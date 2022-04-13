<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $rkalist = DB::table('tbl_rka')
        // ->where('kode_unit', $kode_unit)
        // ->orderBy('tahun_anggaran', 'asc')
        // ->distinct()
        // ->pluck('tahun_anggaran');
        // $rkaCount = $rkalist->count();

        $unitList =  DB::table('unit')->get();
        $unitCount = $unitList->count();

        $userList = DB::table('users')->get();
        $userCount = $userList->count();

        // $realisasiList = DB::table('realisasi')
        // ->where('kode_unit', $kode_unit)
        // ->get();
        // $realisasiCount = $realisasiList->count();
        return view('v_home', compact("unitCount","userCount"));
    }
    
}
