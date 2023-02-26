@extends('admin.main')
@section('content')




<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Detail Pesanan</h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="{{route('master_pesanan.index') }}" class="breadcrumb-link">Daftar Pesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pesanan</li>
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
                    <h3 class="card-header m-4 text-left">Detail Pesanan</h3>
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
                                <th scope="col">Jumlah Pemesanan</th>
                                <th scope="col">Ukuran</th>
                                <th scope="col">Warna</th>
                                <th scope="col">Bahan</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Contoh Model</th>
                                <th scope="col">Model Yang Ditawarkan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Revisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>{{ $pesanan_detail->id_det}}</td>
                                <td>{{ $pesanan_detail->nama_pro}}</td>
                                <td>{{ $pesanan_detail->jumlah_pesanan}}</td>
                                <td>

                                    <p>Panjang= {{$pesanan_detail->panjang}}</p>
                                    <p>Lebar= {{ $pesanan_detail->lebar}}</p>
                                    <p>Tinggi= {{ $pesanan_detail->tinggi}}</p>

                                </td>
                                <td>{{ $pesanan_detail->Warna}}</td>
                                <td>
                                    @foreach($detail_bahans as $detail_bahan)
                                    @if($pesanan_detail->id_det==$detail_bahan->pesanan_detail_id)
                                    <p>{{$detail_bahan->nama_detbah}}</p>
                                    @endif
                                    <?php $no = $no + 1; ?>
                                    @endforeach
                                </td>


                                <td>{{ $pesanan_detail->deskripsi}}</td>
                                <td><a href="{{asset('storage/imageup/'.$pesanan_detail->contoh_model)}}"><img src="{{url('storage/imageup/'.$pesanan_detail->contoh_model)}}" width="100px"></a></td>
                                <td> <a href="/imageup/{{$pesanan_detail->model_ditawarkan}}"><img src='/imageup/{{$pesanan_detail->model_ditawarkan}}' style='width:80px; height:50px;'></a></td>
                                <td>Rp {{number_format ($pesanan_detail->total_hargadet)}}</td>
                                <td>{{ $pesanan_detail->revisi}}</td>
                                <td>
                                    <a href="destroy/{{ $pesanan_detail->id_det }}" class="badge badge-pill badge-danger">Batalkan</a>
                                    <a href="atur/{{ $pesanan_detail->id_det }}" class="badge badge-pill badge-primary">Atur Pesanan</a>
                                </td>
                            </tr>
                            <?php $no = $no + 1 ?>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col-md-12 mt-3">
                    <div class="row d-flex justify-content-end">
                        <div style="margin-left: 10px; margin-right: 10px;">
                            <a href="update2/{{ $idpesan->id_pesan }}" class="btn btn-success ">Ubah Status Pembayaran</a>
                        </div>

                        <div style="margin-left: 10px; margin-right: 10px;">
                            <a href="cetakkw/{{ $idpesan->id_pesan }}" class="btn btn-success ">Cetak Kwitansi</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection