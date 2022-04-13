@extends('layout.v_template')
@section('title', 'Daftar User')

@section('content')
      @if(session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            <?=session('pesan')?>
        </div>
      @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Unit</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php $no =1; ?>
                  @foreach($admin as $data)
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->name?></td>
                    <td><?= $data->kode_unit?></td>
                    <td><?= $data->email?></td>
                    <td>
                    @if($data->level==1)
                    Admin
                    @elseif($data->level==3)
                    Wakil Rektor 2
                    @else
                    User
                    @endif
                    </td>
                    <td><?= $data->status?></td>
                    <td>
                    <form class="form-horizontal" id="quickForm" action="/admin/insertStatusUser/<?= $data->id?>" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @if($data->status=='aktif' && $data->level!=1)
                        <button type="submit" class="btn btn-sm btn-danger" name="status" value="nonaktif">Deaktivasi</button>
                        @else
                        <button type="submit" class="btn btn-sm btn-warning" name="status" value="aktif">Aktivasi</button>
                        @endif
                      </form>
                        <!-- <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $data->id?>">Delete</a> -->
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="/admin/addUser" class="btn btn-info">Tambah User</a>
                
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
            @foreach($admin as $data)
  <div class="modal fade" id="delete<?= $data->id?>">
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
              <a href="/admin/deleteUser/<?= $data->id?>" class="btn btn-outline-dark">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
      <!-- /.modal -->    

@endsection 