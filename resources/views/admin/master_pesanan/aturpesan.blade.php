@extends('admin.main')
@section('content')




<!-- Pageheader -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Atur Pesanan</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item">Detail Pesanan</li>
                        <li class="breadcrumb-item active" aria-current="page">Atur Pesanan</li>
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
            <h5 class="card-header">Form Atur Pesanan</h5>
            <div class="card-body">


                <form action="/master_pesanan/detail/update/{{$pesanan_detail->id_det}}" method="POST" enctype="multipart/form-data">
                    @csrf
               
                   
                    <div class="form-group">
                        <label for="gambar_bahan_baku">Model Yang Ditawarkan</label>
                        <input type="file" name="model_ditawarkan" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="nama">Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                    </div>

                 
                    <div class="col-sm-12 pl-0">
                        <p class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a type="button" class="btn btn-danger " href="master_pesanan">Batal</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection