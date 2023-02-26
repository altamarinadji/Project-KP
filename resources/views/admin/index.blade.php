@extends('admin.main')
@section('content')

<div class="content-wrapper">
    <div class="content">

        <div class="breadcrumb-wrapper">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card bg-primary card-default">
                    <div class="card-body text-white">
                        <h5 class="card-title">Jumlah Pesanan Lunas</h5>
                        <span class="h2 mt-2">{{$pesanan}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card bg-success card-default">
                    <div class="card-body text-white">
                        <h5 class="card-title">Jumlah Produk</h5>
                        <span class="h2 mt-2">{{$paket}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Pesanan Per Produk</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                        <h5 class="mt-2 mb-4">Jumlah Pesanan Per Produk</h5>
                                        <div id="pesanan_produk"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Summary</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                        <h5 class="mt-2 mb-4">Penjualan Perbulan</h5>
                                        <div id="penjualan_produk"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







            </div>
        </div>

    </div>
</div>

@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('pesanan_produk', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Pesanan Per Produk'
        },
        subtitle: {
            text: 'Jumlah Pesanan Per Produk'
        },
        xAxis: {
            categories: 
              {!!json_encode($produks)!!},
            
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Buah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} Buah</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Total Pesanan Produk',
            data: {!!json_encode($jumlah_pesan,JSON_NUMERIC_CHECK)!!}

        }]
    });
</script>
<script>

    Highcharts.chart('penjualan_produk', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Estimasi Pedapatan Perbulan'
        },
        subtitle: {
            text: 'Estimasi Pedapatan Perbulan'
        },
        xAxis: {
            categories: {!!json_encode($tanggal)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rupiah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>Rp {point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Estimasi Pendapatan Perbulan',
            data:  {!!json_encode($pendapatan,JSON_NUMERIC_CHECK)!!}

        }]
    });
</script>
@endsection
