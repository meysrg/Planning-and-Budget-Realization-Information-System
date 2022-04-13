<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgramAdminModel extends Model
{
    public function dataProgram($kode_unit, $tahun_anggaran){
        return DB::table('tbl_rka')->where('kode_unit', $kode_unit)
        ->where('tahun_anggaran', $tahun_anggaran)
        ->orderBy('id_rka', 'desc')
        ->get();
    }

    public function detailProgram($id_rka){
        return DB::table('program_kegiatan')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'program_kegiatan.id_rka')
        ->where('tbl_rka.id_rka', $id_rka)->get();
    }

    public function dataUnit2($kode_unit){
        $r = DB::table('tbl_rka')->where('kode_unit', $kode_unit)->paginate(1);
        return $r[0]->kode_unit;
    }

    public function addStatusRKA($id_rka, $data){
        DB::table('tbl_rka')
        ->where('id_rka', $id_rka)
        ->update($data);
    }

    public function printDataRKA($kode_unit, $tahun_anggaran){
        return DB::table('tbl_rka')->where('kode_unit', $kode_unit)
        ->where('tahun_anggaran', $tahun_anggaran)
        ->get();
    }
    public function printDataProgram($id_rka){
        return DB::table('program_kegiatan')
        ->leftjoin('tbl_rka', 'tbl_rka.id_rka', '=' , 'program_kegiatan.id_rka')
        ->where('tbl_rka.id_rka', $id_rka)->get();
    }
    public function dataIdRKA($id_rka){
        $r = DB::table('program_kegiatan')->where('id_rka', $id_rka)->paginate(1);
        return $r[0]->id_rka;
    }

    public function dataTahun($tahun_anggaran){
        $t = DB::table('tbl_rka')->where('tahun_anggaran', $tahun_anggaran)->paginate(1);
        return $t[0]->tahun_anggaran;
        
    }
}
