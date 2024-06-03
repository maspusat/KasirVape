<!-- dashboard.blade.php -->

@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container">
        <!-- Search Form -->
        <!-- Form Pencarian -->
        <form action="{{ route('admin.dashboard') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="cari" class="form-control" placeholder="Cari Nama Barang" value="{{ $request->get('cari') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <div class="row">
            @foreach ($barang as $item)
                <div class="col-md-2 mb-4">
                    <div class="card flex-fill h-100">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTihUMd88OxzNuL_SImXzmd4pZOUmwZhnMqgA&usqp=CAU" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_barang }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="card-text"><strong>Harga:</strong> {{ $item->harga }}</p>
                            <p class="card-text"><strong>Stok:</strong> {{ $item->stok }}</p>
                                <center>
                                        <button type="submit" class="btn btn-success">Add Cart</button>
                                </center>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /.content -->
</div>
@endsection
