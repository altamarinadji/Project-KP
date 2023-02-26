@extends('admin.main')
@section('content')


<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
        @if( session('message')== 'Pesanan Telah Dibatalkan')
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
            <h2 class="pageheader-title">Master Pesanan</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Pesanan</li>
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
                    <h3 class="card-header m-4 text-left">Daftar Pesanan</h3>
                </div>
            </div>




            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id</th>
                                <th scope="col">Kode Pemesanan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Kode Unik</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">No. Hp</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                            @foreach ($pesanan as $pesanan)
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>{{ $pesanan->id_pesan}}</td>
                                <td>{{ $pesanan->kode_pemesanan}}</td>
                                <td>{{$pesanan->created_at}}</td>
                                <td>{{ $pesanan->status}}</td>
                                <td>{{ $pesanan->total_harga_pesan}}</td> 
                                <td>{{ $pesanan->kode_unik}}</td>
                                <td>{{ $pesanan->name}}</td>
                                <td>{{ $pesanan->nohp}}</td>
                                <td>{{ $pesanan->alamat}}</td>

                                <td>
                                    <a href="master_pesanan/detail/{{ $pesanan->id_pesan }}" class="badge badge-pill badge-primary">Detail</a>
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