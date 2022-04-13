<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->middleware('auth');
    }

    // public function homeAdmin(){
    //     $userList = DB::table('users')->get();
    //     $userCount = $userList->count();

    //     $unitList =  DB::table('unit')->get();
    //     $unitCount = $unitList->count();
    //     return view ('v_admin', compact("userCount", "unitCount"));
    // }

    public function index()
    {
        $data = [
            'admin' =>$this->AdminModel->dataUnit(),
            'wrsatu' =>$this->AdminModel->dataUnitWrSatu(),
            'wrdua' =>$this->AdminModel->dataUnitWrDua(),
        ];
        return view('v_RKAUnitAdmin',$data);
    }

    public function daftarRKAAdmin($kode_unit){
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
        return view('v_daftarRKAAdmin',compact("rka", 'kode_unit', "rkaCount"));
    }
    public function realisasiUnitAdmin()
    {
        $data = [
        'admin' =>$this->AdminModel->dataUnit(),
        'wrsatu' =>$this->AdminModel->dataUnitWrSatu(),
            'wrdua' =>$this->AdminModel->dataUnitWrDua(),
        ];
        return view('v_realisasiUnitAdmin', $data);
    }

    public function daftarUser()
    {
        $data = [
            'admin' =>$this->AdminModel->dataUser(),
        ];
        return view('v_daftarUser',$data);
    }

    public function daftarUnit()
    {
        $data = [
            'admin' =>$this->AdminModel->dataUnit(),
        ];
        return view('v_daftarUnit',$data);
    }

    public function insertUnit(){
        Request()->validate([
            'nama_unit' => 'required',
            'kode_unit' => 'required',
        ]);

        $data = [
            'nama_unit' => Request()->nama_unit,
            'kode_unit' => Request()->kode_unit,
        ];

        $this->AdminModel->addDataUnit($data);
        return redirect()->route('admin')->with('pesan','Data berhasil ditambahkan!');
    }
    public function addUnit()
    {
        return view('v_addUnit');
    }

    public function addUser()
    {
        $data = [
            'unit' => $this->AdminModel->dataUnit(),
        ];
        return view('v_addUser', $data);
    }

    public function insertUser(){
        Request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'kode_unit' => 'required',
            'status' => 'required',
        ]);

        $data = [
            'name' => Request()->name,
            'email' => Request()->email,
            'password' => Hash::make(Request()->password),
            'level' => Request()->level,
            'kode_unit' => Request()->kode_unit,
            'status' => Request()->status,
        ];

        $this->AdminModel->addDataUser($data);
        return redirect()->route('user')->with('pesan','Data berhasil ditambahkan!');
    }

    public function deleteUser($id){

        $this->AdminModel->deleteDataUser($id);
        return redirect()->route('user')->with('pesan', 'Data berhasil dihapus');
    }

    public function editUnit($kode_unit)
    {
        
        $data = [
            'admin' =>$this->AdminModel->editDataUnit($kode_unit),
        ];
        
        
        return view('v_editUnit', $data);
    }

    public function deleteUnit($kode_unit){

        $this->AdminModel->deleteDataUnit($kode_unit);
        return redirect()->route('admin')->with('pesan', 'Data berhasil dihapus');
    }
    public function editUser()
    {
        return view('v_editUser');
    }

    public function insertStatusUser($id){
        Request()->validate([
            'status' =>'required',
        ]);

        $data = [
            'status' => Request()->status,
        ];

        $this->AdminModel->addStatusUser($id, $data);
        return redirect()->route('user');
    }

    public function updateUnit($kode_unit){
        Request()->validate([
            'nama_unit' => 'required',
            'kode_unit' => 'required',
        ]);

        $data = [
            'nama_unit' => Request()->nama_unit,
            'kode_unit' => Request()->kode_unit,
        ];

        $this->AdminModel->updateDataUnit($kode_unit, $data);
        return redirect()->route('admin')->with('pesan','Data berhasil diubah!');
    }

}
