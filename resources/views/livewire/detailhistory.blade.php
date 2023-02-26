<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('history')}}">History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
        </div>
    </div>


    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Produk</td>
                            <td>Nama Produk</td>
                            <td>Jumlah</td>
                            <td>Deskripsi</td>
                            <td>Bahan</td>
                            <td>Desain</td>
                            <td><Strong>Harga</Strong></td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pesanan_details as $pesanan_detail)
                        <tr>
                            <td>
                                {{$no++}}

                            </td>
                            <td>
                                {{$pesanan_detail->product->kode_produk}}
                            </td>
                            <td>
                                {{$pesanan_detail->product->nama_pro}}
                            </td>
                            <td>{{$pesanan_detail->jumlah_pesanan}}</td>

                            <td>{{$pesanan_detail->deskripsi}}</td>

                            <td>
                                @foreach($detail_bahans as $detail_bahan)
                                @if($pesanan_detail->id_det==$detail_bahan->pesanan_detail_id)
                                <p>{{$detail_bahan->nama_detbah}}</p>
                                @endif
                                @endforeach
                            </td>


                            <td>@if(!empty($pesanan_detail->model_ditawarkan))
                                <a href="/imageup/{{$pesanan_detail->model_ditawarkan}}"><img src="/imageup/{{$pesanan_detail->model_ditawarkan}}" width="100px"></a>
                                @else
                                <p>-</p>
                                @endif
                            </td>


                            <td colspan="2" style="text-align: left;"><strong>Rp. {{number_format($pesanan_detail->total_hargadet)}}</strong> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td colspan="7" align="left">Kode Unik</td>
                            <td colspan="1"><strong>Rp. {{number_format($pesanan->kode_unik)}}</strong> </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="left">Total</td>
                            <td colspan="1"><strong>Rp. {{number_format($pesanan->total_harga_pesan+$pesanan->kode_unik)}}</strong> </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="right"></td>
                            <td colspan="7">
                                <a href="/cetak/{{ $pesanan->id_pesan }}" class="btn btn-primary btn-blok">
                                    <i class="fas fa-print"></i> Cetak
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>



</div>