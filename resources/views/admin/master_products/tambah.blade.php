@extends('admin.main')
@section('content')



<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>
<!-- Pageheader -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Tambah Product</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master_products.index') }}" class="breadcrumb-link">Master Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- end pageheader -->

<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form Tambah Product</h5>
            <div class="card-body">


                <form action="/master_products" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="kode">Kode Product</label>
                        <input type="text" class="form-control" name="kode" placeholder="kode Product" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Product</label>
                        <input type="text" class="form-control" name="nama" placeholder="nama Product" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_bahan_baku">Gambar Product </label>
                        <input type="file" name="gambar_pro" required>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Pakai" name="triplek" id="triplek">
                            <label class="form-check-label" for="flexCheckDefault">
                                Triplek
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Pakai" name="kaca" id="kaca">
                            <label class="form-check-label" for="flexCheckDefault">
                                Kaca
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-primary"> Tambah</button>
                            <a type="button" class="btn btn-danger " href="{{route('master_products.index')}}">Batal</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection