@extends('layout.v_template')
@section('title', 'Tambah User')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="quickForm" action="/admin/insertUser" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="col-sm-10">
                      <input type="text" name="status" class="form-control" value="aktif">
                    </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
                        <div class="input-group-append">
                          @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </div>
                  </div>

                <div class="form-group row">
                    <label for="kode_unit" class="col-sm-2 col-form-label">Pilih Unit</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="kode_unit">
                        <option value="null">-</option>
                          @foreach($unit as $data)
                        <option value="<?= $data->kode_unit?>"><?= $data->nama_unit?></option>
                          @endforeach
                      </select>
                      <div class="input-group-append">
                          @error('kode_unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                </div>

                  <div class="form-group row">
                    <label for="pilih_role" class="col-sm-2 col-form-label">Pilih Role</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="level">
                        <option value="null">-</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        <option value="3">WR 2</option>
                      </select>
                      <div class="input-group-append">
                        @error('role')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                          @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                      <div class="input-group-append">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <div class="input-group-append">
                      </div>
                    </div>
                  </div>
            
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-info">Tambah</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
@endsection 