@extends('layout.v_template')
@section('title', 'Edit RKA')

@section('content')
    <!-- Horizontal Form -->
      <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Tambah RKA</h3>
          </div>
              <!-- form start -->
              <form class="form-horizontal" id="quickForm" action="/rka/updateRKA/<?= $rka->id_rka?>/<?=$rka->tahun_anggaran?>" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="form-group row">
                    <label for="tahun_anggaran" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                            <?php
                                $tanggal=getdate();
                                $tanggal2 = $tanggal['year']+1;
                            ?>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tahun_anggaran" name="tahun_anggaran" value="<?= $rka->tahun_anggaran?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pilih_unit" class="col-sm-2 col-form-label ">Unit</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kode_unit">
                          <option value="<?= $rka->kode_unit?>"><?= $rka->kode_unit?></option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="mata_anggaran" class="col-sm-2 col-form-label">Mata Anggaran</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('mata_anggaran') is-invalid @enderror" name="mata_anggaran" id="mata_anggaran" value="<?= $rka->mata_anggaran?>">
                      <div class="invalid-feedback">
                        @error('mata_anggaran')
                            <?= $message ?>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama_program" class="col-sm-2 col-form-label">Nama Anggaran</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('nama_program') is-invalid @enderror" name="nama_program" id="nama_program" value="<?= $rka->nama_anggaran?>">
                      <div class="invalid-feedback">
                        @error('nama_program')
                            <?= $message ?>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">SIMPAN</button>
                </div>
                <!-- /.card-footer -->
              </form>
      </div>
            <!-- /.card -->
@endsection 