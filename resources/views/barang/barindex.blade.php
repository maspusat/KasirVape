@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
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
                    <a href="{{ route('admin.bar.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Barang</h3>

                            <div class="card-tools">
                                <form action="{{ route('admin.bar.index') }}" method="get">
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
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Stok</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $brng)
                                    <tr>
                                     <td>{{ $startNumber++ }}</td>
                                        <td>{{ $brng->nama_barang }}</td>
                                        <td>{{ $brng->harga }}</td>
                                        <td>{{ $brng->deskripsi }}</td>
                                        <td>{{ $brng->stok }}</td>
                                        <td>
                                            <a href="{{ route('admin.bar.edit',['id' => $brng->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                                            <a data-toggle="modal" data-target="#modal-hapus{{ $brng->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-hapus{{ $brng->id }}">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus barang ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <form action="{{ route('admin.bar.delete', ['id' => $brng->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $barang->appends(['cari' => $request->get('cari')])->links('pagination::bootstrap-4') }}
                        </div>

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
