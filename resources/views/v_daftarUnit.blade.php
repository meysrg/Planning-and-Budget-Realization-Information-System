@extends('layout.v_template')
@section('title', 'Daftar Unit')

@section('content')
        <div class="mb-3">
            <a href="/admin/addUnit" class="btn btn-info">Tambah Unit</a>
        </div>

        @if(session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            <?=session('pesan')?>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Unit</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Unit</th>
                    <th>Nama Unit</th>
                    <th>Aksi</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php $no =1; ?>
                  @foreach($admin as $data)
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->kode_unit?></td>
                    <td><?= $data->nama_unit?></td>
                    <td>
                    <a href="/admin/editUnit/<?=$data->kode_unit?>" class="btn btn-sm btn-warning">Edit</a>
                        <!-- <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?=$data->kode_unit?>">Delete</a> -->
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
            
              <!-- /.card-body -->
        </div>
           
  
        @foreach($admin as $data)

    <div class="modal fade" id="delete<?=$data->kode_unit?>">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin akan menghapus data ini?&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="" class="btn btn-outline-dark" data-dismiss="modal">No</a>
                    <a href="/admin/deleteUnit/<?=$data->kode_unit?>" class="btn btn-outline-dark">Yes</a>
                </div>
            </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @endforeach
      <!-- /.modal -->    

@endsection 