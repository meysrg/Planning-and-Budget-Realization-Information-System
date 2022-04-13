@extends('layout.v_template')
@section('title', 'Tambah RKA')

@section('content')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var mata_anggaran = $("#mata_anggaran").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"mata_anggaran="+mata_anggaran ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama_anggaran').val(obj.nama_anggaran);
                });
            }
        </script> -->


    <!-- Horizontal Form -->
      <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Tambah RKA</h3>
          </div>
              <!-- form start -->
              <form class="form-horizontal" id="quickForm" action="/rka/insertRKA" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="form-group row">
                    <label for="tahun_anggaran" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                            <?php

use Illuminate\Support\Facades\Auth;

$tanggal=getdate();
                                $tanggal2 = $tanggal['year']+1;
                            ?>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran"  value="<?= $tanggal2;?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="kode_unit" class="col-sm-2 col-form-label">Kode Unit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('kode_unit') is-invalid @enderror" name="kode_unit" id="kode_unit" value="<?=Auth::user()->kode_unit?>">
                      <div class="invalid-feedback">
                        @error('kode_unit')
                            <?= $message ?>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="mata_anggaran" class="col-sm-2 col-form-label">Mata Anggaran</label>
                    <div class="col-sm-10">
                    <select class="form-control @error('mata_anggaran') is-invalid @enderror"  name="mata_anggaran">
                        <option value="null">-</option>
                          @foreach($anggaran as $data)
                        <option value="<?= $data->mata_anggaran?>"><?= $data->mata_anggaran?></option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback">
                        @error('mata_anggaran')
                            <?= $message ?>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama_angggaran" class="col-sm-2 col-form-label">Nama Anggaran</label>
                    <div class="col-sm-10">
                    <select class="form-control @error('mata_anggaran') is-invalid @enderror" name="nama_anggaran">
                        <option value="null">-</option>
                          @foreach($anggaran as $data)
                        <option value="<?= $data->nama_anggaran?>"><?= $data->nama_anggaran?></option>
                          @endforeach
                      </select>
                      <div class="invalid-feedback">
                        @error('nama_angggaran')
                            <?= $message ?>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Selanjutnya</button>
                </div>
                <!-- /.card-footer -->
              </form>
      </div>
            <!-- /.card -->
@endsection 