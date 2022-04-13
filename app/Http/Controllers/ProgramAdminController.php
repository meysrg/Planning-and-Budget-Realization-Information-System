<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramAdminModel;

class ProgramAdminController extends Controller
{
    public function __construct(){
        $this->ProgramAdminModel = new ProgramAdminModel();
        $this->middleware('auth');
    }

    public function index($kode_unit, $tahun_anggaran){
        if(!$this->ProgramAdminModel->dataProgram($kode_unit, $tahun_anggaran)){
            abort(404);
        }
        $data = [
            'program' =>$this->ProgramAdminModel->dataProgram($kode_unit, $tahun_anggaran),
            'unit' =>$this->ProgramAdminModel->dataUnit2($kode_unit),
            'tahun' =>$this->ProgramAdminModel->dataTahun( $tahun_anggaran),
        ];
        return view('v_daftarProgramAdmin', $data);
        
    }

    public function detail($id_rka){
        if(!$this->ProgramAdminModel->detailProgram($id_rka)){
            abort(404);
        }
        $data = [
            'program' =>$this->ProgramAdminModel->detailProgram($id_rka),
            'rka' =>$this->ProgramAdminModel->dataIdRKA($id_rka),
        ];
        return view('v_detailDaftarProgramAdmin', $data);
    }

    public function insertStatus($id_rka){
        Request()->validate([
            'status' =>'required',
        ]);

        $data = [
            'status' => Request()->status,
        ];

        $this->ProgramAdminModel->addStatusRKA($id_rka, $data);
        return redirect()->route('programAdmin', ['kode_unit' => Request()->kode_unit, 'tahun_anggaran' => Request()->tahun_anggaran] );
        
    }

    public function printRKA($kode_unit, $tahun_anggaran){
        $data = [
            'program' =>$this->ProgramAdminModel->printDataRKA($kode_unit, $tahun_anggaran),
        ];
        return view('v_printRKAAdmin', $data);
    }
    public function printProgram($id_rka){
        $data = [
            'program' =>$this->ProgramAdminModel->printDataProgram($id_rka),
            
        ];
        return view('v_printProgramKegiatanAdmin', $data);
    }
}
