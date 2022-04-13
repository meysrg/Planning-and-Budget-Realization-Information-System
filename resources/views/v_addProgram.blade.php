@extends('layout.v_template')
@section('title', 'Tambah Program Kegiatan')

@section('content')

    <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Program Kegiatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="quickForm" action="/program/insertProgram" method="POST"  enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                @foreach($program as $data)
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="id_program" id="id_program" value="<?= $data ->id_program ?>">
                    </div>
                @endforeach
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="kode_unit" id="kode_unit" value="<?= $unit?>">
                    </div>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="<?= $tahun?>">
                    </div>

                  <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Nama Program</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="volume" class="col-sm-2 col-form-label">Volume</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="volume" name="volume">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="satuan" id="satuan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan (1000 rupiah)</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="harga_satuan" name="harga">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah (1000 rupiah)</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="jumlah" name="jumlah">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="waktu_start" class="col-sm-2 col-form-label">Waktu Start</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="waktu_start" name="waktu_start">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="waktu_finish" class="col-sm-2 col-form-label">Waktu Finish</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="waktu_finish" name="waktu_finish">
                    </div>
                  </div>

                  
            
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-info" >Selesai</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
@endsection 