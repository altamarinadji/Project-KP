<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Produk</td>
                            <td>Nama Produk</td>
                            <td>Jumlah</td>
                            <td>Deskripsi</td>
                            <td>Detail Bahan</td>
                            <td>Contoh Model</td>
                            <td>Model Yang Ditawarkan</td>
                            <td>Revisi</td>
                            <td colspan="2"><Strong>Harga</Strong></td>
                            <td colspan="3"><strong>Aksi</strong> </td>

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

                            <td>
                                @if(!empty($pesanan_detail->contoh_model))
                                <a href="{{asset('storage/imageup/'.$pesanan_detail->contoh_model)}}">Lihat Model</a>
                                @else
                                <p>-</p>
                                @endif
                            </td>

                            <td>@if(!empty($pesanan_detail->model_ditawarkan))
                                <a href="/imageup/{{$pesanan_detail->model_ditawarkan}}"><img src="/imageup/{{$pesanan_detail->model_ditawarkan}}" width="100px"></a>
                                @else
                                <p>-</p>
                                @endif
                            </td>

                            <td>{{$pesanan_detail->revisi}}</td>


                            <td colspan="2" style="text-align: left;"><strong>Rp. {{number_format($pesanan_detail->total_hargadet)}}</strong> </td>
                            <td>
                                <a href="{{route('revisi',$pesanan_detail->id_det)}}" class="btn btn-primary btn-blok">
                                    Revisi
                                </a>
                            </td>
                            <td>
                                <i wire:click="destroy({{$pesanan_detail->id_det}})" class="fas fa-trash text-danger"></i>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13">Data Kosong</td>
                        </tr>
                        @endforelse
                        @if(!empty($pesanan))
                        <tr>
                            <td colspan="9" align="right"><Strong>Total Harga:</Strong></td>
                            <td colspan="4">Rp. {{number_format($pesanan->total_harga_pesan)}}</td>
                        </tr>
                        <tr>
                            <td colspan="9" align="right"><Strong>Kode Unik:</Strong></td>
                            <td colspan="4">Rp. {{number_format($pesanan->kode_unik)}}</td>
                        </tr>




                        @if($belum_harga->belumharga!=0)

                        @else
                        <tr>
                            <td colspan="8" align="right"></td>
                            <td colspan="8">
                                <a href="{{route('checkout')}}" class="btn btn-success btn-blok">
                                    <i class="fas fa-arrow-right"></i> Check Out
                                </a>
                            </td>
                        </tr>
                        @endif





                        @endif
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>