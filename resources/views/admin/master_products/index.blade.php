@extends('admin.main')
@section('content')



<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
        @if( session('message')== 'Data Telah Dihapus')
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
        @else
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Master Product</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Product</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- ============================================================== -->
    <!-- basic table  -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="container">
                <div class="row">
                    <h3 class="card-header m-4 text-left">Daftar Product</h3>
                    <div class="col text-right m-4">
                        <a href="{{route('master_products.create') }}" class="btn btn-primary mb-1">Tambah Product</a>
                    </div>
                </div>
            </div>




            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id</th>
                                <th scope="col">Nama Product</th>
                                <th scope="col">Gambar Product</th>
                                <th scope="col">Bahan Opsional</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($product as $product)
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>{{ $product->kode_produk}}</td>
                                <td>{{ $product->nama_pro}}</td>
                              
                                <td> <a href="imageup/{{$product->gambar_pro}}"><img src='imageup/{{$product->gambar_pro}}' style='width:80px; height:50px;'></a></td>
                                <td>
                                @if($product->Kaca == "")
                                Kaca: Tidak Pakai
                                @else
                                Kaca: {{$product->Kaca}}
                                @endif
                                <br>
                                @if($product->Triplek == "")
                                Triplek: Tidak Pakai
                                @else
                                Triplek: {{$product->Triplek}}
                                @endif
                                </td>
                                <td>
                                    <a href="master_products/edit/{{ $product->id_pro }}" class="badge badge-pill badge-warning">Ubah</a>
                                    <a href="master_products/destroy/{{ $product->id_pro }}" class="badge badge-pill badge-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $no=$no+1; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection