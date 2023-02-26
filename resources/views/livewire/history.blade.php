<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
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
                            <td>Tangal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Pesanan</td>
                            <td>Status</td>

                            <td><Strong>Total Harga</Strong></td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pesanans as $pesanan)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pesanan->created_at}}</td>
                            <td>{{$pesanan->kode_pemesanan}}</td>
                            <td>
                                <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id_pesan)->get(); ?>
                                @foreach($pesanan_details as $pesanan_detail)

                                {{$pesanan_detail->product->nama_pro}}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if($pesanan->status==1)
                                Memeriksa Pembayaran
                                @else
                                Sudah Dibayar
                                @endif
                            </td>

                            <td><strong>Rp. {{number_format($pesanan->total_harga_pesan+$pesanan->kode_unik)}}</strong></td>
                            <td>
                                <a href="{{route('detailhistory',$pesanan->id_pesan)}}" class="btn btn-primary btn-blok">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk pembayaran dapat ditransfer ke rekening dibawah ini</p>
                    <div class="media">
                        <img class="mr-3" src="{{url('assets/mandiri.png')}}" alt="Bank Mandiri" width="70">
                        <div class="media-body">
                            <h5 class="mt-0">BANK MANDIRI</h5>
                            No. Rekening 140-001-935-8986 atas nama <strong>Deny Indra Prasetyo</strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>