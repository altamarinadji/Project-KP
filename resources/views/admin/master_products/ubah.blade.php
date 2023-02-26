@extends('admin.main')
@section('content')

<!-- Pageheader -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Ubah Product</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master_products.index') }}" class="breadcrumb-link">Master Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Product</li>
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
            <h5 class="card-header">Form Ubah Product</h5>
            <div class="card-body">

                <form action="/master_products/update/{{$product->id_pro}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                       
                        <input type="text" class="form-control" name="id" value="{{ $product->id_pro}}" hidden disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama">kode Product</label>
                        <input type="text" class="form-control" name="kode" placeholder="kode Product" value="{{ $product->kode_produk}}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Product</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Product" value="{{ $product->nama_pro}}" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar_bahan_baku">Gambar Bahan Baku </label>
                        <input type="file" name="gambar_pro">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            @if($product->Triplek =="")
                            <input class="form-check-input" type="checkbox" value="Pakai" name="triplek" id="triplek">
                            @else
                            <input class="form-check-input" type="checkbox" value="Pakai" name="triplek" id="triplek" checked>
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Triplek
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            @if($product->Kaca =="")
                            <input class="form-check-input" type="checkbox" value="Pakai" name="kaca" id="kaca">
                            @else
                            <input class="form-check-input" type="checkbox" value="Pakai" name="kaca" id="kaca" checked>
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Kaca
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-12 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-primary"> Ubah</button>
                            <a type="button" class="btn btn-danger " href="{{route('master_products.index')}}">Batal</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection