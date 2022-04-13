@extends('layout.v_template')
@section('title', 'Daftar Program')

@section('content')
<a href="/program/admin/printRKA/<?=$unit?>/<?=$tahun?>" target="blank" class="btn btn-sm btn-primary mb-3">Print to PDF</a><br>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Program</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                
                  <tr>
                    <th>No</th>
                    <th>Mata Anggaran</th>
                    <th>Rincian Proram/Aktifitas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no =1; ?>
                @foreach($program as $data)
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->mata_anggaran?></td>
                    <td><?= $data->nama_anggaran?></td>
                    <td><?= $data->status?></td>
                    <td>
                        
                        <form class="form-horizontal" id="quickForm" action="/program/admin/insertStatus/<?= $data->id_rka?>" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="kode_unit" id="kode_unit" value="<?= $unit?>">
                          <input type="hidden" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="<?= $tahun?>">
                        </div>
                        <a href="/program/detail/admin/<?=$data->id_rka?>" class="btn btn-sm btn-success">Detail</a>
                        <button type="submit" class="btn btn-sm btn-warning" name="status" value="diterima">Terima</button>
                        <button type="submit" class="btn btn-sm btn-danger" name="status" value="ditolak">Tolak</button>
                      </form>
                    </td>
                  </tr> 
                @endforeach                 
                </tbody>
              </table>
            </div>
              <!-- /.card-body -->
          </div>

@endsection 