@extends('layout.v_template')
@section('title', 'Edit User')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" id="quickForm" action="/admin/updateUser" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="name" name="name" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kode_unit" class="col-sm-2 col-form-label">Pilih Unit</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kode_unit">
                            <option value=""></option>
                            
                            <option value=""></option>
                            
                        </select>
                    </div>
                </div>

                  <div class="form-group row">
                    <label for="pilih_role" class="col-sm-2 col-form-label">Pilih Role</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="level">
                        <option value=""></option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
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
                      <input type="email" name="email" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control">
                    <div class="input-group-append">
                      </div>
                    </div>
                  </div>
            
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <button type="submit" class="btn btn-info">SIMPAN</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
@endsection 