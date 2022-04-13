<?php

use Illuminate\Support\Facades\Auth;
?>
@extends('layout.v_template')
@section('title', 'Daftar Program')

@section('content')
<a href="/program/printRKA/<?= Auth::user()->kode_unit?>/<?=$tahun?>" target="blank" class="btn btn-sm btn-primary mb-3">Print to PDF</a><br>
      @if(session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            <?=session('pesan')?>
        </div>
      @endif

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
                    <th>Nama Anggaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no =1; ?>
                @foreach($program as $data)
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->mata_anggaran?> </td>
                    <td><?= $data->nama_anggaran?></td>
                    <td><?= $data->status?></td>
                    <td>
                        <a href="/program/detail/<?=$data->id_rka?>" class="btn btn-sm btn-success">Detail</a>
                        <a href="/program/addProgramKegiatan/<?=$data->id_rka?>" class="btn btn-sm btn-primary">Add</a>
                        <a href="/program/edit/<?=$data->id_rka?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?=$data->id_rka?>">Delete</a>
                    </td>
                  </tr>  
                  @endforeach
                </tbody>
              </table>
            </div>
              <!-- /.card-body -->
          </div>
           
          @foreach($program as $data)
  <div class="modal fade" id="delete<?=$data->id_rka?>">
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
              <a href="/rka/deleteRKA/<?=$data->id_rka?>" class="btn btn-outline-dark">Yes</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach
      <!-- /.modal -->

@endsection 