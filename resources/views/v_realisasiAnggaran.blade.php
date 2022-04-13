@extends('layout.v_template')
@section('title', 'Realisasi Anggaran')

@section('content')
<?php
    function rupiah($angka) {
        $hasil = "Rp. ". number_format($angka, '2', ',', '.');
        return $hasil;
    }
?>

<a href="/realisasiAnggaran/print/<?=$unit?>" target="blank" class="btn btn-sm btn-primary mb-3">Print to PDF</a><br>


            @if(session('pesan'))
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  <?=session('pesan')?>
              </div>
            @endif
            

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
                    <td><?= $data->status?></td> 
                    <td>
                      <a href="/realisasiAnggaran/detailRealisasiAnggaran/<?=$data->id_realisasi?>" class="btn btn-sm btn-success">Detail</a>
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