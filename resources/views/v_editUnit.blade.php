@extends('layout.v_template')
@section('title', 'Edit Unit')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Unit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="quickForm" action="/admin/updateUnit/<?=$admin[0]->kode_unit?>" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                <div class="form-group row">
                    
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" id="kode_unit" name="kode_unit" value="<?=$admin[0]->kode_unit?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama_unit" class="col-sm-2 col-form-label">Nama Unit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama_unit" name="nama_unit" value="<?=$admin[0]->nama_unit?>">
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