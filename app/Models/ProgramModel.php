<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgramModel extends Model
{
    protected $table = 'program_kegiatan';
    protected $fillable= [
        'nama_kegiatan', 'volume', 'satuan', 'harga', 'jumlah', 'waktu_start', 'waktu_finish', 'id_rka'
    ];
    public function insertDataProgram($id_program, $data){
        DB::table('program_kegiatan')
        ->where('id_program', $id_program)
        ->update($data);
    }
    public function insertProgram($data){
        DB::table('program_kegiatan')
        ->insert($data);
    }


    public function dataProgram($kode_unit, $tahun_anggaran){
        return DB::table('tbl_rka')->where('kode_unit', $kode_unit)
        ->where('tahun_anggaran', $tahun_anggaran)
        ->orderBy('id_rka', 'desc')
        ->get();
    }

    public function addDataRKA($data){
        DB::table('tbl_rka')->insert($data);
    }

    public function detailProgram($id_rka){
        return DB::table('program_kegiatan')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'program_kegiatan.id_rka')
        ->where('tbl_rka.id_rka', $id_rka)->get();
    }

    public function editRKA($id_rka){
        return DB::table('tbl_rka')->where('id_rka', $id_rka)->first();
    }    

    public function editDataProgram($id_program){
        return DB::table('program_kegiatan')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'program_kegiatan.id_rka')
        ->where('id_program', $id_program)->first();
    }

    
    public function updateDataProgram($id_program, $data){
        DB::table('program_kegiatan')
        ->where('id_program', $id_program)
        ->update($data);
    }

    public function dataUnit2(){
        $unit =  DB::table('program_kegiatan')->orderBy('id_program', 'DESC')->paginate(1);
        $u = $unit[0]->id_rka;
        $d= DB::table('tbl_rka')->where('id_rka', $u)
        ->paginate(1);
        return $d[0]->kode_unit;
    }

    //cara ambil id rka nya??
    public function dataIdRKA($id_rka){
        $r = DB::table('program_kegiatan')->where('id_rka', $id_rka)->paginate(1);
        return $r[0]->id_rka;
    }

    
    public function printDataRKA($kode_unit, $tahun_anggaran){
        return DB::table('tbl_rka')->where('kode_unit', $kode_unit)
        ->where('tahun_anggaran', $tahun_anggaran)
        //->orderBy('id_rka', 'desc')
        ->get();
    }

    public function printDataProgramKegiatan($id_rka){
        return DB::table('program_kegiatan')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'program_kegiatan.id_rka')
        ->where('tbl_rka.id_rka', $id_rka)->get();
    }

    public function deleteDataProgramKegiatan($id_program){
        DB::table('program_kegiatan')
        ->where('id_program', $id_program)
        ->delete();
    }

    public function dataUnit($kode_unit){
        $r = DB::table('tbl_rka')->where('kode_unit', $kode_unit)->paginate(1);
        return $r[0]->kode_unit;
    }

    public function dataTahun($tahun_anggaran){
        $t = DB::table('tbl_rka')->where('tahun_anggaran', $tahun_anggaran)->paginate(1);
        return $t[0]->tahun_anggaran;
    }

    public function addDataProgram($id_rka){
        return DB::table('tbl_rka')->where('id_rka', $id_rka)->get();
    }

}
