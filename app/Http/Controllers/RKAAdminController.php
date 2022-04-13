<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RKAAdminModel;

class RKAAdminController extends Controller
{
    public function __construct(){
        $this->RKAAdminModel = new RKAAdminModel();
        $this->middleware('auth');

    }

    public function index(){
        //$data = [
            //'mahasiswa' =>$this->MahasiswaModel->dataMahasiswa(),
        //];
        return view('v_daftarRKAAdmin');
    }
}
