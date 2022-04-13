<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramModel;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function __construct(){
        $this->ProgramModel = new ProgramModel();
        $this->middleware('auth');

    }


// menampilkan data RKA
    public function index($kode_unit, $tahun_anggaran){
        if(!$this->ProgramModel->dataProgram($kode_unit, $tahun_anggaran)){
            abort(404);
        }
        $data = [
            'program' =>$this->ProgramModel->dataProgram($kode_unit, $tahun_anggaran),
            'unit' =>$this->ProgramModel->dataUnit($kode_unit),
            'tahun' =>$this->ProgramModel->dataTahun( $tahun_anggaran),
        ];
        return view('v_daftarProgram', $data);
    }

    public function detail($id_rka){
        if(!$this->ProgramModel->detailProgram($id_rka)){
            abort(404);
        }
        $data = [
            'program' =>$this->ProgramModel->detailProgram($id_rka),
            'unit' =>$this->ProgramModel->dataUnit2(),
            'rka' =>$this->ProgramModel->dataIdRKA($id_rka),
        ];
        return view('v_detailDaftarProgram', $data);
    }

    public function insertProgram(){
        Request()->validate([
            'nama_kegiatan' =>'required',
            'volume' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'waktu_start' => 'required',
            'waktu_finish' => 'required',
        ]);
        //jika sudah valid maka simpan data
        $id_program = Request()->id_program;
            $data = [
                'nama_kegiatan' => Request()->nama_kegiatan,
                'volume' => Request()->volume,
                'satuan' => Request()->satuan,
                'harga' => Request()->harga,
                'jumlah' => Request()->jumlah,
                'waktu_start' => Request()->waktu_start,
                'waktu_finish' => Request()->waktu_finish,
            ]; 
            
            $this->ProgramModel->insertDataProgram($id_program, $data);
            
        
        return redirect()->route('program', ['kode_unit' => Request()->kode_unit, 'tahun_anggaran' => Request()->tahun_anggaran] )->with('pesan','Data berhasil ditambahkan!');
    }

    public function edit($id_rka){
        if(!$this->ProgramModel->editRKA($id_rka)){
            abort(404);
        }
        $data = [
            'rka' =>$this->ProgramModel->editRKA($id_rka),
            'unit' =>$this->ProgramModel->dataUnit2(),
        ];
        //$item = ProgramModel::findOrFail($id_rka);
        return view('v_editRKA', $data);
    }

    public function editProgram($id_program, $tahun_anggaran, $kode_unit){
        if(!$this->ProgramModel->editDataProgram($id_program)){
            abort(404);
        }
        $data = [
            'program' =>$this->ProgramModel->editDataProgram($id_program, $tahun_anggaran, $kode_unit),
            //'unit' =>$this->ProgramModel->dataUnit2(),
           
        ];
        
        return view('v_editProgram', $data);
    }

    public function updateProgram($id_program){
        Request()->validate([
            'nama_kegiatan' =>'required',
            'volume' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'waktu_start' => 'required',
            'waktu_finish' => 'required',
        ]);
        //jika sudah valid maka simpan data
            $data = [
                'nama_kegiatan' => Request()->nama_kegiatan,
                'volume' => Request()->volume,
                'satuan' => Request()->satuan,
                'harga' => Request()->harga,
                'jumlah' => Request()->jumlah,
                'waktu_start' => Request()->waktu_start,
                'waktu_finish' => Request()->waktu_finish,
            ]; 
            
            $this->ProgramModel->updateDataProgram($id_program, $data);
        
        return redirect()->route('program', ['kode_unit' => Request()->kode_unit, 'tahun_anggaran' => Request()->tahun_anggaran] )->with('pesan','Data berhasil diupdate!');
    }

    public function printRKA($kode_unit, $tahun_anggaran){
        $data = [
            'program' =>$this->ProgramModel->printDataRKA($kode_unit, $tahun_anggaran),
        ];
        return view('v_printRKA', $data);
    }

    public function printProgramKegiatan($id_rka){
        $data = [
            'program' =>$this->ProgramModel->printDataProgramKegiatan($id_rka),
            'rka' =>$this->ProgramModel->dataIdRKA($id_rka),
        ];
        return view('v_printProgramKegiatan', $data);
    }

    public function deleteProgramKegiatan($id_program){
        $this->ProgramModel->deleteDataProgramKegiatan($id_program);
        
        //return redirect()->route('program2',  Request()->id_rka)->with('pesan', 'Data berhasil dihapus');
        return back()->with('pesan', 'Data berhasil dihapus');
    }

    
    public function addProgramKegiatan($id_rka){
        $data = [
            'program' =>$this->ProgramModel->addDataProgram($id_rka),
        ];
        return view('v_addProgram2',compact('id_rka'));
    }

    public function insertDataProgram(Request $request, $id_rka){
        $request->validate([
             'nama_kegiatan' =>'required',
             'volume' => 'required',
             'satuan' => 'required',
             'harga' => 'required',
            'jumlah' => 'required',
            'waktu_start' => 'required',
            'waktu_finish' => 'required',
        ]);
        //jika sudah valid maka simpan data
            // $data = [
            //     'nama_kegiatan' => Request()->nama_kegiatan,
            //     'volume' => Request()->volume,
            //     'satuan' => Request()->satuan,
            //     'harga' => Request()->harga,
            //     'jumlah' => Request()->jumlah,
            //     'waktu_start' => Request()->waktu_start,
            //     'waktu_finish' => Request()->waktu_finish,
            // ]; 
            $data =[
                'id_rka'=> $id_rka,
                'nama_kegiatan' => $request->nama_kegiatan,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
                'waktu_start' => $request->waktu_start,
                'waktu_finish' => $request->waktu_finish,
            ];
            
            $this->ProgramModel->insertProgram($data);
        
        return redirect()->route('program2',  Request()->id_rka)->with('pesan','Data berhasil ditambahkan!');
        //return back()->with('pesan','Data berhasil ditambahkan!');
    }

    
}
