<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = DB::table('pesanans')->select('kode_pemesanan')->where('status', '2')->count('kode_pemesanan');
        $data['pesanan'] = $pesanan;

        //Jumlah Paket 
        $jumlah_paket = DB::table('products')->select('nama_pro')->count('nama_pro');
        $data['paket'] = $jumlah_paket;


        // Menampilkan tabel pesanan
        $packages = DB::table('pesanans')->join('pesanan_details', 'pesanan_details.pesanan_id', '=', 'pesanans.id_pesan')
            ->join('products', 'pesanan_details.product_id', '=', 'products.id_pro')->get();
        $data['transactions'] = $packages;

        //produk
        // $produks = [];
        // $pro = DB::table('products')->get();
        // foreach ($pro as $produk) {
        //     $produks[] = $produk->nama_pro;
        // }

        //Jumlah Paket 
        // $jumlah_paket = DB::table('products')
        //     ->select('id_pro', DB::raw('count(*) as total'))->groupBy('id_pro')->get();
        // $data['perpaket'] = $jumlah_paket;
        // //raw = untuk kondisi diantara string dan int


        // // laporan oi
        $tanggal = [];
        $pendapatan = [];
        $Report = DB::table('pesanans')->select(DB::raw('count(total_harga_pesan) as hargatot'),  DB::raw('CONCAT( MONTH(updated_at), "-", YEAR(updated_at)) as tanggal'))->where('pesanans.status', '2')
            ->groupby('tanggal')
            ->get();
        foreach ($Report as $report) {
            $tanggal[] = $report->tanggal;
        }
        foreach ($Report as $report) {
            $pendapatan[] = $report->hargatot;
        }


        // $viewer = DB::table('pesanans')->select(DB::raw("SUM(total_harga_pesan) as totalpendapatan"))
        //     ->orderBy("updated_at")
        //     ->groupBy(DB::raw("month(updated_at)"))
        //     ->get()->toArray();
        // $viewer = array_column($viewer, 'totalpendapatan');





        //
        $produk_pesan = [];
        $nama_pro = [];
        $jumlah_pesan_produk = DB::table('pesanan_details')
            ->join('products', 'pesanan_details.product_id', '=', 'products.id_pro')->select('nama_pro', DB::raw('sum(pesanan_details.jumlah_pesanan) as totalpesan'))->groupBy('nama_pro')
            ->get();
        foreach ($jumlah_pesan_produk as $jmlh) {
            $produk_pesan[] = $jmlh->totalpesan;
        }
        foreach ($jumlah_pesan_produk as $jmlh_p) {
            $nama_pro[] = $jmlh_p->nama_pro;
        }





            return view("admin.index", $data, [
                'produks' => $nama_pro,
                'jumlah_pesan' => $produk_pesan,
                'tanggal' => $tanggal,
                'pendapatan' => $pendapatan
            ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
