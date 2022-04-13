<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RKAModel extends Model
{
    protected $table = 'tbl_rka';
    protected $fillable= [
        'tahun_anggaran', 'mata_anggaran', 'nama_program', 'kode_unit', 'status'
    ];
    public function dataUnit(){
        return DB::table('unit')->get();
    }

    public function dataAnggaran(){
        return DB::table('anggaran')->get();
    }
    // public function dataCountRKA(){
    //     $data =  DB::table('tbl_rka')
    // }

    public function addDataRKA($data){
        DB::table('tbl_rka')->insert($data);
    }

    public function dataRKA($kode_unit){
        $data =  DB::table('tbl_rka')
        // ->where('kode_unit', $kode_unit)
        ->groupBy('tahun_anggaran')
        ->get();
        dd($data);
        // ->distinct('tahun_anggaran');
    }


    public function addIdRKA($data2){
        DB::table('program_kegiatan')->insert($data2);
    }

    public function dataProgram(){
        return DB::table('program_kegiatan')->orderBy('id_program', 'DESC')->paginate(1);
    }

    public function dataUnit2(){
        $unit =  DB::table('program_kegiatan')->orderBy('id_program', 'DESC')->paginate(1);
        $u = $unit[0]->id_rka;
        $d= DB::table('tbl_rka')->where('id_rka', $u)
        ->paginate(1);
        return $d[0]->kode_unit;
    }
    public function dataTahun(){
        $unit =  DB::table('tbl_rka')->orderBy('id_rka', 'DESC')->paginate(1);

        
        $u = $unit[0]->tahun_anggaran;
        $d= DB::table('tbl_rka')->where('tahun_anggaran', $u)
        ->paginate(1);
        return $d[0]->tahun_anggaran;
    }

    public function editDataRKA($id_rka, $data){
        DB::table('tbl_rka')
        ->where('id_rka', $id_rka)
        ->update($data);
    }   

    // public function deleteDataRKA($id_rka){
    //     DB::table('tbl_rka')
    //     //->where('id_rka', $id_rka)
    //     ->where('id_rka', $id_rka)->references('id_rka', $id_rka)->on('program_kegiatan')
    //     ->onDelete('cascade');
        
    // }
}
