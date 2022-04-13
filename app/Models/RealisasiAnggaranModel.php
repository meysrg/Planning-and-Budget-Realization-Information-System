<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RealisasiAnggaranModel extends Model
{
    public function dataUnit(){
        return DB::table('unit')->get();
    }
    public function addDataRealisasi($data){
        DB::table('realisasi')->insert($data);
    }
    public function dataRealisasi($kode_unit, $tahun_anggaran){
        return  DB::table('realisasi')
        ->leftjoin('program_kegiatan', 'program_kegiatan.id_program', '=' , 'realisasi.id_program')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'realisasi.id_rka')
        ->where('realisasi.kode_unit', $kode_unit)
        ->where('tahun_anggaran', $tahun_anggaran)
        ->get();
       
    }
    public function dataRealisasi2($kode_unit){
        $r = DB::table('realisasi')->where('kode_unit', $kode_unit)->paginate(1);
        return $r[0]->kode_unit;
    }
    public function printDataRealisasi($kode_unit){
        return DB::table('realisasi')->where('kode_unit', $kode_unit)->get();
    }
    public function dataProgram($id_program, $tahun_anggaran){
        return DB::table('program_kegiatan')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'program_kegiatan.id_rka')
        ->where('program_kegiatan.id_program', $id_program)
        ->where('tahun_anggaran', $tahun_anggaran)
        ->first();
    }

    public function dataMata($mata){
        return $mata;
    }

    public function detailRealisasi($id_realisasi){
            return DB::table('realisasi')
            ->where('id_realisasi', $id_realisasi)
            ->get();
    }



}
