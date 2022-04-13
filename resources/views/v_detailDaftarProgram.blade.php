@extends('layout.v_template')
@section('title', 'Detail Daftar Program')

@section('content')
<?php
    function rupiah($angka) {
        $hasil = "Rp. ". number_format($angka, '2', ',', '.');
        return $hasil;
    }
?>

<a href="/program/printProgramKegiatan/<?=$rka?>" target="blank" class="btn btn-sm btn-primary mb-3">Print to PDF</a><br>


      @if(session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            <?=session('pesan')?>
        </div>
      @endif
      <!-- @if(session('pesandetail'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Data detail tidak ada!</h5>
            <?=session('pesandetail')?>
        </div>
      @endif -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Program</h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Mata Anggaran</th>
                    <th>Rincian Proram/Aktifitas</th>
                    <th>Volume</th>
                    <th>Satuan</th>
                    <th>Harga Satuan (1000 rupiah)</th>
                    <th>Jumlah (1000 rupiah)</th>
                    <th>Waktu Start</th>
                    <th>Waktu Finish</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no =1; ?>
                @foreach($program as $data)
                  <tr>
                  <form action="" method="POST">
                    <?php
                      $mata= $data->mata_anggaran . "." . $no++;
                    ?>
                  </form>
                    <td><?= $mata?></td>
                    <td><?= $data->nama_kegiatan?></td>
                    <td><?= $data->volume?></td>
                    <td><?= $data->satuan?></td>
                    <td><?= rupiah($data->harga)?></td>
                    <td><?= rupiah($data->jumlah)?></td>
                    <td><?= $data->waktu_start?></td>
                    <td><?= $data->waktu_finish?></td>
                    <td>
                    <a href="/realisasiAnggaran/uploadLaporan/<?= $data->id_program?>/<?=$mata?>/<?= $data->tahun_anggaran?>" class="btn btn-sm btn-primary">Upload Laporan</a><br>
                        <a href="/program/editProgram/<?= $data->id_program?>/<?= $data->tahun_anggaran?>/<?= $data->kode_unit?>" class="btn btn-sm btn-warning mt-2">Edit</a><br>
                        <a href="" class="btn btn-sm btn-danger mt-2" data-toggle="modal" data-target="#delete<?= $data->id_program?>">Delete</a>
                    </td>
                  </tr>    
                  @endforeach      
                </tbody>
              </table>
            </div>
              <!-- /.card-body -->
          </div>
            
          @foreach($program as $data)
  <div class="modal fade" id="delete<?= $data->id_program?>">
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
              <a href="/program/deleteProgramKegiatan/<?= $data->id_program?>" class="btn btn-outline-dark">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach 
      <!-- /.modal -->

@endsection 