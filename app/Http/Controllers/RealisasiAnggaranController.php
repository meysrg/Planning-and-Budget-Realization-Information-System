<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RealisasiAnggaranModel;
use Illuminate\Support\Facades\DB;

class RealisasiAnggaranController extends Controller
{
    public function __construct(){
        $this->RealisasiAnggaranModel = new RealisasiAnggaranModel();
        $this->middleware('auth');

    }

    public function index($kode_unit, $tahun_anggaran){
        if(!$this->RealisasiAnggaranModel->dataRealisasi($kode_unit, $tahun_anggaran)){
            abort(404);
        }
        $data = [
            'realisasi' =>$this->RealisasiAnggaranModel->dataRealisasi($kode_unit, $tahun_anggaran),
            'unit' =>$this->RealisasiAnggaranModel->dataRealisasi2($kode_unit),
        ];
        return view('v_realisasiAnggaran', $data);
    }

    public function uploadLaporan($id_program, $mata, $tahun_anggaran){
        $data = [
            'realisasi' =>$this->RealisasiAnggaranModel->dataUnit(),
            'program' =>$this->RealisasiAnggaranModel->dataProgram($id_program, $tahun_anggaran),
            'mata' =>$this->RealisasiAnggaranModel->dataMata($mata),
        ];

        
        
        return view('v_uploadLaporan', $data);
    }

    public function unit(){
        $data = [
            'realisasi' =>$this->RealisasiAnggaranModel->dataUnit(),
        ];
        return view('v_realisasiAnggaranUnit', $data);
    }

    public function insertLaporan(){
        Request()->validate([
            'id_program' =>'required',
            'id_rka' =>'required',
            'kode_unit' =>'required',
            'mata_anggaran' =>'required',
            'nama_kegiatan' => 'required',
            'rincian_aktivitas' => 'required',
            'total_dana' => 'required',
            'dana_digunakan' => 'required',
            'sisa_dana' => 'required',
            'bukti' => 'required|mimes:jpg,jpeg,png,bnp,pdf|max:1024',
        ]);

        //jika sudah valid maka simpan data
        //upload bukti
        $file = Request()->bukti;
        $filename = Request()->nama_kegiatan.'.'.$file->extension();
        $file->move(public_path('bukti'), $filename);

        $data = [
            'id_program' => Request()->id_program,
            'id_rka' => Request()->id_rka,
            'kode_unit' => Request()->kode_unit,
            'mata_anggaran' => Request()->mata_anggaran,
            'nama_kegiatan' => Request()->nama_kegiatan,
            'rincian_aktivitas' => Request()->rincian_aktivitas,
            'total_dana' => Request()->total_dana,
            'dana_digunakan' => Request()->dana_digunakan,
            'sisa_dana' => Request()->sisa_dana,
            'bukti' => $filename,
        ];

        $this->RealisasiAnggaranModel->addDataRealisasi($data);
        return redirect()->route('realisasi',['kode_unit' => Request()->kode_unit, 'tahun_anggaran' => Request()->tahun_anggaran])->with('pesan','Data berhasil ditambahkan!');
    }

    public function print($kode_unit){
        $data = [
            'realisasi' =>$this->RealisasiAnggaranModel->printDataRealisasi($kode_unit),
        ];
        return view('v_printRealisasi', $data);
    }

    public function detailRealisasiAnggaran($id_realisasi){
        if(!$this->RealisasiAnggaranModel->detailRealisasi($id_realisasi)){
            abort(404);
        }
        $data = [
            'detailRealisasi' =>$this->RealisasiAnggaranModel->detailRealisasi($id_realisasi),
            'unit' =>$this->RealisasiAnggaranModel->dataUnit(),
        ];
        return view('v_detailRealisasiAnggaran', $data);
    }

    public function realisasiRKA($kode_unit){
        $rka = DB::table('realisasi')
        ->leftjoin('program_kegiatan', 'program_kegiatan.id_program', '=' , 'realisasi.id_program')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'realisasi.id_rka')
        ->where('realisasi.kode_unit', $kode_unit)
        ->orderBy('tahun_anggaran', 'asc')
        ->distinct()
        ->pluck('tahun_anggaran');
        
        return view('v_realisasiRKA', compact("rka", 'kode_unit'));
    }

    

}
