<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<style>
    body {
        font-family: arial;
    }

    .print {
        margin-top: 10px;
    }

    @media print {
        .print {
            display: none;
        }
    }

    table {
        border-collapse: collapse;
    }
</style>

<body>

    <table border="0" width="100%" cellspacing="" cellpadding="1">
        <tr>
            <td colspan="5">
                <p><b>CV. DENY ALUMINIUM</b></p>
            </td>
            <td colspan="1">
                <p></p>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <p>No.Telp: (0858)-50757026 <br> Email: denyndra.26@gmail.com <br>Alamat: Ketabang Magersari 1 No 28, Surabaya, Jawa Timur</p>
            </td>
            <td colspan="1">
          
                <p>Kode Pemesanan: {{$pesanan->kode_pemesanan}} <br> Tanggal Pemesanan: {{date('d-m-Y', strtotime($tgl->updated_at))}} <br> Nama Pelanggan: {{$pesanan->name}}</p>
            
            </td>
        </tr>
        <tr>
       
    </table>
    <center>
        <h3>
            Kwitansi Pembelian
        </h3>
    </center>








    <hr />



    <br>
    <br>
    <br>
    <center>
        <table border="1" cellspacing="" cellpadding="4" width="100%">
            <tr>
                <td>No</td>
                <td>Kode Produk</td>
                <td>Nama Produk</td>
                <td>Jumlah Pesanan</td>
                <td><Strong>Harga</Strong></td>
                <td><Strong>Status Pembayaran</Strong></td>
            </tr>

            <?php $no = 1 ?>
            @forelse ($pesanan_details as $pesanan_detail)
            <tr>
                <td>
                    {{$no++}}

                </td>
                <td>
                    {{$pesanan_detail->kode_produk}}
                </td>
                <td>
                    {{$pesanan_detail->nama_pro}}
                </td>
                <td>{{$pesanan_detail->jumlah_pesanan}}</td>


                <td>Rp. {{number_format($pesanan_detail->total_hargadet)}}</td>

                <td style="text-align: left;"> <strong>

                        @if($pesanan_detail->status!=2)
                        Memeriksa Pembayaran
                        @else
                        Lunas
                        @endif

                    </strong></td>

            </tr>

            <?php
            $total = $pesanan_detail->total_harga_pesan + $pesanan_detail->kode_unik;
            ?>
            <?php
            $kodeunik = $pesanan_detail->kode_unik;
            ?>
            @empty
            <tr>
                <td colspan="5">Data Kosong</td>
            </tr>
            @endforelse
            <tr>
                <td colspan="5">Kode Unik</td>
                <td colspan="1"><strong>Rp<?php echo number_format($kodeunik) ?></strong> </td>
            </tr>
            <tr>
                <td colspan="5">Total</td>
                <td colspan="1"><strong>Rp<?php echo number_format($total) ?></strong> </td>
            </tr>
        </table>
    </center>

    <table width="100%">
    <tr>
        <td></td>
        <td width="200px">
            <br/>
                <center>
                <p>Surabaya, {{ date('d,m,Y') }} <br/>
                    Penerima,
                </center>

            <br/>
            <br/>
            <br/>
            <center>
                <p> <u>Sutoyo</u> </p>
            </center>
        </td>
    </tr>
</table>
</body>

</html>