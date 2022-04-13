<?php

use App\Http\Controllers\RKAController;
use App\Models\ProgramModel;
use App\Models\RKAModel;

?>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
          <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p style="color: white;">
                Dashboard
              </p>
            </a>
          </li>

          
            @if(auth()->user()->level == 3)
            <!-- <li class="nav-item">
          <a href="/homeWr" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p style="color: white;">
                Dashboard
              </p>
            </a> -->
          </li>
              <li class="nav-item">
                <a href="/admin/rkaUnitAdmin" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p style="color: white;">Daftar RKA
                  </p>
                </a>
            </li>
              <li class="nav-item">
                <a href="/admin/realisasiUnitAdmin" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                  <p style="color: white;">Realisasi Anggaran</p>
                </a>
              </li>
            @elseif (auth()->user()->level == 1)
            <li class="nav-item">
              <a href="/homeAdmin" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p style="color: white;">
                    Dashboard
                  </p>
              </a>
            </li>
              <li class="nav-item">
                <a href="/admin/user" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  <p style="color: white;">Daftar User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/unit" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                  <p style="color: white;">Daftar Unit</p>
                </a>
              </li>

            @else
            

            <li class="nav-item">
                <a href="{{route('addRKA')}}" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                  <p style="color: white;">Tambah RKA</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="/rka/<?= Auth::user()->kode_unit?>" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p style="color: white;">Daftar RKA
                  </p>
                </a>
            </li>

              <li class="nav-item">
                <a href="/realisasiAnggaran/realisasiRKA/<?= Auth::user()->kode_unit?>" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                  <p style="color: white;">Realisasi Anggaran</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/realisasiAnggaran/uploadLaporan" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                  <p style="color: white;">Upload Laporan</p>
                </a>
              </li> -->
            
            @endif
              
            </ul>
          </li>
      </nav>