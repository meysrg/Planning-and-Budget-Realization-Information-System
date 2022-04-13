<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    public function dataUser(){
        return DB::table('users')->get();
    }
    public function dataUnit(){
        return DB::table('unit')->get();
    }
    public function addDataUnit($data){
        DB::table('unit')->insert($data);
    }

    public function dataRKA(){
        return DB::table('tbl_rka')->get();
    }

    public function addDataUser($data){
        DB::table('users')->insert($data);
    }

    public function deleteDataUser($id){
        DB::table('users')
        ->where('id', $id)
        ->delete();
    }

    public function editDataUnit($kode_unit){
        return DB::table('unit')->where('kode_unit', $kode_unit)->get();
    }

    public function deleteDataUnit($kode_unit){
        DB::table('unit')
        ->where('kode_unit', $kode_unit)
        ->delete();
    }
    public function dataUnitWrSatu(){
       return DB::table('unit')
        ->where('kode_unit', 'like', 'WR1%')
        ->get();
    }
    public function dataUnitWrDua(){
       return DB::table('unit')
                ->where('kode_unit', 'like', 'WR2%')
                ->get();
    }

    public function addStatusUser($id,$data){
        DB::table('users')
        ->where('id', $id)
        ->update($data);
    }

    public function updateDataUnit($kode_unit, $data){
        DB::table('unit')
        ->where('kode_unit', $kode_unit)
        ->update($data);
    }
    
    


}
