
@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <a href="{{route('admin.cus.create')}}" class="btn btn-primary mb-3">Tambah Customer</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Customer</h3>

                <div class="card-tools">
                  <form action="{{ route('admin.cus.index') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="cari" class="form-control float-right" placeholder="Cari" value="{{ $request->get('cari') }}">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                        <th>No</th>
                      <!-- <th>Profil</th> -->
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No Telpon</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($customers as $cust)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cust->nik }}</td>
                        <td>{{ $cust->name }}</td>
                        <td>{{ $cust->phone }}</td>
                        <td>{{ $cust->address }}</td>
                        <td>
                            <a href="{{route('admin.cus.edit',['id' => $cust->id])}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                            <a data-toggle="modal" data-target="#modal-hapus{{$cust->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-hapus{{ $cust->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data <b>{{ $cust->name }}</b></p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <form action="{{route('admin.cus.delete',['id' => $cust->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Iyaa, Hapus</button>
                                </form>
                            </div>
                            </div>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
