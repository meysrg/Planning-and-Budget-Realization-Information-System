@extends('layout.v_template')
@section('title', 'Pilih Unit')

@section('content')
    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <hr>
        <h4>Unit WR1</h4>
        <hr>
        <div class="row">
          @foreach($admin as $data)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <a href="/realisasiAnggaran/admin/realisasiRKAAdmin/<?= $data->kode_unit?>" style="color: white;"><h3><?= $data->nama_unit?></h3></a>
                  <p>Unit</p>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>  
              </div>       
            </div>
          @endforeach
        </div>
        <hr>
        <h4>Unit WR2</h4>
        <hr>
        <div class="row">
          @foreach($wrdua as $data)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <a href="/realisasiAnggaran/admin/realisasiRKAAdmin/<?= $data->kode_unit?>" style="color: white;"><h3><?= $data->nama_unit?></h3></a>
                  <p>Unit</p>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>  
              </div>       
            </div>
          @endforeach
        </div>
        <hr>
        <h4>Unit WR3</h4>
        <hr>
        <div class="row">
          @foreach($admin as $data)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <a href="/realisasiAnggaran/admin/realisasiRKAAdmin/<?= $data->kode_unit?>" style="color: white;"><h3><?= $data->nama_unit?></h3></a>
                  <p>Unit</p>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>  
              </div>       
            </div>
          @endforeach
        </div>
      </div>

@endsection 