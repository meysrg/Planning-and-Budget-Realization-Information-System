@extends('layout.v_template')
@section('title', 'Home')

@section('content')
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <H1>Selamat Datang Di Sistem Informasi dan Realisasi Anggaran Institut Teknologi Del</H1>
        </div>


        <!-- <div class="card card-success">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{asset('template')}}/dist/img/photo1.png" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white">Visi</h5>
                    <p class="card-text text-white pb-2 pt-1">Menjadi pusat keunggulan yang berperan dalam pemanfaatan teknologi bagi kemajuan bangsa.</p>
                    <a href="#" class="text-white">Sejak 2001</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{asset('template')}}/dist/img/photo1.png" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white">3M</h5>
                    <p class="card-text text-white pb-2 pt-1">MarTuhan, Marroha, Marbisuk</p>
             
                   
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{asset('template')}}/dist/img/photo1.png" alt="Dist Photo 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h5 class="card-title text-primary text-white">Alamat</h5>
                    <p class="card-text text-white pb-2 pt-1">Jl. Sisingamangaraja Sitoluama-Laguboti</p>
                    <a href="#" class="text-white">Toba Samosir 22381, Sumatera Utara-Indonesia</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <a href="" style="color: white;"><h4>Jumlah RKA</h4></a>
                  <p>RKA</p>
                </div>
                <div class="icon">
                  <i class="ion  ion-ios-folder "></i>
                  <!-- <ion-icon name="newspaper-outline"></ion-icon> -->
                </div>  
              </div>       
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <a href="" style="color: white;"><h4>Jumlah Realisasi</h4></a>
                  <p> Realisasi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-android-done-all"></i>
                </div>  
              </div>       
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <a href="" style="color: white;"><h4>Jumlah User</h4></a>
                  <p style="color: white;"><?=$userCount?> User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>  
              </div>       
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <a href="" style="color: white;"><h4>Jumlah Unit </h4></a>
                  <p><?=$unitCount?> Unit </p>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>  
              </div>       
            </div>
        </div>
      </div>

      


@endsection 