@extends('layout.v_template')
@section('title', 'Realisasi Anggaran')

@section('content')
<a href="/realisasiAnggaran/admin/printRealisasi/<?=$unit?>" target="blank" class="btn btn-sm btn-primary mb-3">Print to PDF</a><br>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Realisasi Anggaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Mata Anggaran</th>
                    <th>Nama Program</th>
                    <th>Rincian Aktivitas</th>
                    <th>Total Dana</th>
                    <th>Dana Digunakan</th>
                    <th>Sisa Dana</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>Aksi</th>

                  </tr>
                  </thead>
                  <tbody>
                <?php $no =1; ?>
                @foreach($realisasi as $data)
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->mata_anggaran?></td>
                    <td><?= $data->nama_kegiatan?></td>
                    <td><?= $data->rincian_aktivitas?></td>
                    <td><?= $data->total_dana?></td>
                    <td><?= $data->dana_digunakan?></td>
                    <td><?= $data->sisa_dana?></td>
                    <td><img src="<?= url('bukti/'.$data->bukti)?>" width="50" alt=""></td>
                    <td><?= $data->status?></td>
                    <td>
                      <form class="form-horizontal" id="quickForm" action="/realisasiAnggaran/insertStatus/<?= $data->id_realisasi?>" method="POST"  enctype="multipart/form-data">
                      @csrf
                        <div class="col-sm-10">
                          <input type="hidden" class="form-control" name="kode_unit" id="kode_unit" value="<?= $unit?>">
                          <input type="hidden" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="<?= $data->tahun_anggaran?>">
                        </div>
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

  <!-- <div class="modal fade" id="delete">
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
              <a href="" class="btn btn-outline-dark">Yes</a>
            </div>
          </div>
          /.modal-content 
        </div>
         /.modal-dialog 
      </div>
/.modal -->

@endsection 