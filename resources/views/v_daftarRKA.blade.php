@extends('layout.v_template')
@section('title', 'Daftar RKA')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            @foreach ($rka as $data)
            <div class="small-box bg-info">
              <div class="inner">
                <a href="/program/<?=$kode_unit?>/<?=$data?>" style="color: white;"><h5>Tahun Anggaran  </h5></a>
                <p><?= $data?></p>
              </div>
              <div class="icon">
                <i class="ion  ion-ios-folder"></i>
              </div>
              
            </div>
            @endforeach
          </div>
          
        </div>
          <!-- ./col -->
      </div>
        <!-- /.row -->
        <!-- Main row -->

@endsection 