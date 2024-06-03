
@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <form action="{{route('admin.cus.update',['id' => $customers->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Edit Customer</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>
                    <div class="card-body">
                      <div class="form-group">
                          <label for="nik">NIK</label>
                          <input type="text" name="nik" class="form-control" value="{{ $customers->nik }}" id="nik" placeholder="Enter NIK">
                          @error('nik')
                              <small>{{ $message }}</small>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="name" name="name" class="form-control" value="{{ $customers->name }}" id="name" placeholder="Enter nama">
                        @error('name')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="phone">NO HP</label>
                        <input type="phone" name="phone" class="form-control" value="{{ $customers->phone }}" id="phone" placeholder="Enter NO HP">
                        @error('phone')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="address" name="address" class="form-control" value="{{ $customers->address }}" id="address" placeholder="Enter NO HP">
                        @error('address')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!--/.col (left) -->
            </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

  </div>
@endsection
