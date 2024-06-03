
@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
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
            <a href="{{route('admin.user.create')}}" class="btn btn-primary mb-3">Add User</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Admin Toko Xhuman Vape Store</h3>

                <div class="card-tools">
                  <form action="{{ route('admin.user.index') }}" method="get">
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ini_data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <!-- <td><img src="{{asset('storage/photo-user/'.$d->image)}}" alt="" width="100"></td> -->
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email }}</td>
                        <td>
                            <a href="{{route('admin.user.edit',['id' => $d->id])}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                            <a data-toggle="modal" data-target="#modal-hapus{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-hapus{{ $d->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin menghapus data <b>{{ $d->name }}</b></p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <form action="{{route('admin.user.delete',['id' => $d->id])}}" method="POST">
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
