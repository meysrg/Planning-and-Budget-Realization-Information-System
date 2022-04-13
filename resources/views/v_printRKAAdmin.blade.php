
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Realisasi Anggaran</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Daftar Rencana Kerja Anggaran
          <small class="float-right">Date: <?= date('d-M-Y')?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    
    <!-- /.row -->

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
                        </tr> 
                    @endforeach                 
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
