@extends('layout.v_template')
@section('title', 'Home')

@section('content')
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <H1>Selamat Datang Di Sistem Informasi dan Realisasi Anggaran Institut Teknologi Del</H1>
        </div>

        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
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