@extends('layout.v_template')
@section('title', 'Tambah Unit')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Unit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="quickForm" action="/admin/insertUnit" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                <div class="form-group row">
                    <label for="kode_unit" class="col-sm-2 col-form-label">Kode Unit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('kode_unit') is-invalid @enderror" id="kode_unit" name="kode_unit">
                      <div class="invalid-feedback">
                        @error('kode_unit')
                            <?= $message ?>
                        @enderror
                    </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama_unit" class="col-sm-2 col-form-label">Nama Unit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('nama_unit') is-invalid @enderror" id="nama_unit" name="nama_unit">
                      <div class="invalid-feedback">
                        @error('nama_unit')
                            <?= $message ?>
                        @enderror
                    </div>
                    </div>
                  </div>
            
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-info">Tambah</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
@endsection 