<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealisasiAnggaranAdminModel;
use Illuminate\Support\Facades\DB;

class RealisasiAnggaranAdminController extends Controller
{
    public function __construct(){
        $this->RealisasiAnggaranAdminModel = new RealisasiAnggaranAdminModel();
        $this->middleware('auth');

    }

    public function index($kode_unit, $tahun_anggaran){
        if(!$this->RealisasiAnggaranAdminModel->dataRealisasi($kode_unit, $tahun_anggaran) || !$this->RealisasiAnggaranAdminModel->dataRealisasi2($kode_unit)){
            abort(404);
        }
        $data = [
            'realisasi' =>$this->RealisasiAnggaranAdminModel->dataRealisasi($kode_unit, $tahun_anggaran),
            'unit' =>$this->RealisasiAnggaranAdminModel->dataRealisasi2($kode_unit),
            
        ];
        return view('v_realisasiAnggaranAdmin', $data);
    }

    public function insertStatus($id_realisasi){
        Request()->validate([
            'status' =>'required',
        ]);

        $data = [
            'status' => Request()->status,
        ];

        $this->RealisasiAnggaranAdminModel->addStatusRealisasi($id_realisasi, $data);
        return back();
        // return redirect()->route('realisasiAdmin', Request()->kode_unit);
        // return redirect()->route('realisasiAdmin', ['kode_unit' => Request()->kode_unit, 'tahun_anggaran' => Request()->tahun_anggaran] );
        
    }

    public function printRealisasi($kode_unit){
        $data = [
            'realisasi' =>$this->RealisasiAnggaranAdminModel->printDataRealisasi($kode_unit),
        ];
        return view('v_printRealisasiAdmin', $data);
    }

    public function realisasiRKAAdmin($kode_unit,$tahun_anggaran){
        $rka = DB::table('realisasi')
        ->leftjoin('program_kegiatan', 'program_kegiatan.id_program', '=' , 'realisasi.id_program')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'realisasi.id_rka')
        ->where('realisasi.kode_unit', $kode_unit)
        ->orderBy('tahun_anggaran', 'asc')
        ->distinct()
        ->pluck('tahun_anggaran');
    
        return view('v_realisasiRKAAdmin',compact("rka", 'kode_unit', 'tahun_anggaran'));
        
    }

}
