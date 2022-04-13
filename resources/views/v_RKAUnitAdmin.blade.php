@extends('layout.v_template')
@section('title', 'Pilih Unit')

@section('content')
    <!-- Main content -->
      <div class="container-fluid mt-3">
      <h4>Unit</h4>
      <hr>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @foreach($admin as $data)
            <div class="col-lg-3 col-6 mt-2">
              <!-- small box -->
              <div class="small-box bg-info" style="width: 230px; height: 130px;">
                <div class="inner">
                  <a href="/admin/daftarRKAAdmin/<?= $data->kode_unit?>" style="color: white;"><h6><?= $data->nama_unit?></h6></a>
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
        <h4>Unit WR1</h4>
        <hr>
        <div class="row">
          @foreach($wrsatu as $data)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h6>Unit</h6>
                  <a href="/admin/daftarRKAAdmin/<?= $data->kode_unit?>" style="color: white;"><p><?= $data->nama_unit?></p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-home"></i>
                </div>  
              </div>       
            </div>
          @endforeach
        </div>
        <hr>
        <h4><b>Unit WR2</b></h4>
        <hr>
        <div class="row">
          @foreach($wrdua as $data)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info" style="width: 400px">
                <div class="inner">
                  <a href="/admin/daftarRKAAdmin/<?= $data->kode_unit?>" style="color: white;"><h6><?= $data->nama_unit?></h6></a>
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