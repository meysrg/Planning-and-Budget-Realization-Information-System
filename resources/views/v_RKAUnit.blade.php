@extends('layout.v_template')
@section('title', 'Pilih Unit')

@section('content')
    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @foreach($rka as $data)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <a href="/rka/<?=$data->kode_unit?>" style="color: white;"><h3><?= $data->nama_unit?></h3></a>
                  <p>Unit</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>  
              </div>       
            </div>
          @endforeach
        </div>
        
      </div>

@endsection 