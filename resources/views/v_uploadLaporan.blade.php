@extends('layout.v_template')
@section('title', 'Upload Laporan')

@section('content')
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Upload Laporan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" id="quickForm" action="/realisasiAnggaran/insertLaporan" method="POST"  enctype="multipart/form-data">
                @csrf
                    <div class="card-body">

                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="id_program" id="id_program" value="<?= $program->id_program ?>">
                    </div>
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="tahun_anggaran" id="tahun_anggaran" value="<?= $program->tahun_anggaran ?>">
                    </div>

                    <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="id_rka" id="id_rka" value="<?= $program->id_rka?>">
                            </div>

                    <div class="form-group row">
                            <label for="kode_unit" class="col-sm-2 col-form-label">Kode Unit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode_unit" id="kode_unit" value="<?= $program->kode_unit?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mata_anggaran" class="col-sm-2 col-form-label">Mata Anggaran</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mata_anggaran" id="mata_anggaran" value="<?= $mata?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?= $program->nama_kegiatan?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rincian_aktivitas" class="col-sm-2 col-form-label">Rincian Aktivitas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="rincian_aktivitas" name="rincian_aktivitas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total_dana" class="col-sm-2 col-form-label">Total Dana</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="total_dana" id="total_dana" value="<?= $program->jumlah?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dana_digunakan" class="col-sm-2 col-form-label">Dana Digunakan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="dana_digunakan" name="dana_digunakan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sisa_dana" class="col-sm-2 col-form-label">Sisa Dana</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sisa_dana" name="sisa_dana">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bukti" class="col-sm-2 col-form-label">Bukti</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="bukti" name="bukti">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Upload</button>
                    </div>
                <!-- /.card-footer -->
                </form>
            </div>
@endsection 