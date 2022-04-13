<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RKAModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RKAController extends Controller
{
    public function __construct(){
        $this->RKAModel = new RKAModel();
        $this->middleware('auth');

    }

    public function RKAUnit(){
        $data = [
            'rka' =>$this->RKAModel->dataUnit(),
            'countRKA' => $this->RKAModel->dataCountRKA(),
        ];
        return view('v_RKAUnit', $data);
    } 

    public function addRKA(){
        $data = [
            'rka' =>$this->RKAModel->dataUnit(),
            'anggaran' =>$this->RKAModel->dataAnggaran(),
        ];
        return view('v_addRKA', $data);
    }

    // public function navigasi(){
    //     $rka = DB::table('tbl_rka')->get();
    //     return view('v_nav', compact("rka",  'tahun_anggaran'));
    // }
    
    public function index($kode_unit){
        // $data = [
        //     'rka' =>$this->RKAModel->dataRKA($kode_unit),
        //    // 'unit' =>$this->RKAModel->dataUnit($kode_unit),
        // ];
        
        $rka = DB::table('tbl_rka')
        ->where('kode_unit', $kode_unit)
        ->orderBy('tahun_anggaran', 'asc')
        ->distinct()
        ->pluck('tahun_anggaran');
        $rkalist = DB::table('tbl_rka')
        ->where('kode_unit', $kode_unit)
        //->where('tahun_anggaran', $tahun_anggaran)
        ->get();
        $rkaCount = $rkalist->count();
        return view('v_daftarRKA',compact("rka", 'kode_unit', "rkaCount"));
    }

    public function insertRKA(){
        Request()->validate([
            'tahun_anggaran' =>'required',
            'kode_unit' => 'required',
            'mata_anggaran' => 'required',
            'nama_anggaran' => 'required',
        ]);

        $data = [
            'tahun_anggaran' => Request()->tahun_anggaran,
            'mata_anggaran' => Request()->mata_anggaran,
            'nama_anggaran' => Request()->nama_anggaran,
            'kode_unit' => Request()->kode_unit,
        ];

        $this->RKAModel->addDataRKA($data);

        $id =  DB::table('tbl_rka')->orderBy('id_rka', 'DESC')->first();

        $data2 = [
            'id_rka' => $id->id_rka,
        ];


        $this->RKAModel->addIdRKA($data2);

        $data3 = [
            'kode_unit' => $id->kode_unit,
            'tahun_anggaran' => $id->tahun_anggaran,
        ];

        return redirect()->route('addProgram', $data3);

    }

    public function addProgram(){
        $data = [
            'program' =>$this->RKAModel->dataProgram(),
            'unit' =>$this->RKAModel->dataUnit2(),
            'tahun' =>$this->RKAModel->dataTahun(),
        ];
        return view('v_addProgram', $data);
    }

    public function updateRKA($id_rka, $tahun_anggaran){
        Request()->validate([
            'tahun_anggaran' =>'required',
            'kode_unit' => 'required',
            'mata_anggaran' => 'required',
            'nama_anggaran' => 'required',
        ]);

        $data = [
            'tahun_anggaran' => Request()->tahun_anggaran,
            'mata_anggaran' => Request()->mata_anggaran,
            'nama_anggaran' => Request()->nama_anggaran,
            'kode_unit' => Request()->kode_unit,
        ];

        $this->RKAModel->editDataRKA($id_rka, $data);

        return redirect()->route('program', ['kode_unit' => Request()->kode_unit, 'tahun_anggaran' => Request()->tahun_anggaran] )->with('pesan','Data berhasil diupdate!');
        //return back()->with('pesan','Data berhasil diupdate!');
    }

    public function deleteRKA($id_rka){
        //$this->RKAModel->deleteDataRKA($id_rka);
        RKAModel::where('id_rka', $id_rka)->delete();
        //$delete =  DB::table('program_kegiatan')->where('id_rka', $id_rka)->forceDelete();
        //return redirect()->route('program', Request()->kode_unit)->with('pesan', 'Data berhasil dihapus');
        return back()->with('pesan', 'Data berhasil dihapus');
    }
  
}
