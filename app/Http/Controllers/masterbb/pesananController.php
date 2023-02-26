<?php

namespace App\Http\Controllers\masterbb;

use App\DetailBahan;
use App\Http\Controllers\Controller;
use App\Pesanan;
use App\PesananDetail;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class pesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->detail_bahans = DB::table('detail_bahans')
        //         ->join ('pesanan_details','pesanan_details.id','=','detail_bahans.pesanan_detail_id')
        //         ->join ('pesanans','pesanans.id','=','pesanan_details.pesanan_id')
        //         ->where('pesanan_details.pesanan_id', $this->pesanan->id)
        //         ->get(); 
        $pesanan = DB::table('pesanans')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->orderBy('pesanans.created_at','DESC')
            ->get();
        $detail = DB::table('detail_bahans')
            ->join('pesanan_details', 'pesanan_details.id_det', '=', 'detail_bahans.pesanan_detail_id')
            ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
            ->get();
        return view('admin.master_pesanan.index', compact('pesanan'));
    }
    public function detail($id)
    {

        $pesanandet = DB::table('pesanan_details')
            ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
            ->join('products', 'products.id_pro', '=', 'pesanan_details.product_id')
            ->where('pesanan_details.pesanan_id', $id)
            ->get();
        $pesanan = DB::table('pesanans')
        ->where('id_pesan', $id)
        ->first();
        $detailbah = DB::table('detail_bahans')
            ->get();
        return view('admin.master_pesanan.detail', [

            'pesanan_details' => $pesanandet,
            'detail_bahans' => $detailbah,
            'idpesan'=>$pesanan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master_products.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = product::where('id', $id)->first();
        // return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('pesanan_details')->where('id_det', '=', $id)->first();
        return view::make('admin.master_pesanan.aturpesan')->with('pesanan_detail', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cetak($id)
    {
        
            $pesanans = DB::table('pesanans')->join('users', 'users.id', '=', 'pesanans.user_id')->where('id_pesan', $id)->first();
            $pesanantgl = DB::table('pesanans')->where('id_pesan', $id)->first();
           
                $pesanan_details = DB::table('pesanan_details')
                ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
                ->join('products', 'products.id_pro', '=', 'pesanan_details.product_id')
                ->where('pesanan_details.pesanan_id', $id)
                ->get();

                $detail_bahans = DB::table('detail_bahans')
                    ->join('pesanan_details', 'pesanan_details.id_det', '=', 'detail_bahans.pesanan_detail_id')
                    ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
                    ->where('pesanan_details.pesanan_id', $id)
                    ->get();
          
            $pdf = PDF::loadview("admin/cetak", [
                'pesanan' => $pesanans,
                'pesanan_details' => $pesanan_details,
                'detail_bahans' => $detail_bahans,
                'tgl'=> $pesanantgl,
            ]);
            return $pdf->download("kwitansi.pdf");
        
    }
    public function update2($id)
    {
        $data = Pesanan::where('id_pesan', '=', $id)->first();
        $data->status = 2;
        $data->update();
        session()->flash('message', 'Berhasil Mengubah Status Pembayaran');
        return redirect('master_pesanan');
    }
    public function update(Request $request, $id)
    {
        $pesanandetail = PesananDetail::where('id_det', '=', $id)->first();
        $pesanan = Pesanan::where('id_pesan', '=', $pesanandetail->pesanan_id)->first();


        if ($pesanan->total_harga_pesan == 0) {
            $pesanan->total_harga_pesan = $request->harga;
            $pesanan->Dp = $pesanan->total_harga_pesan / 2;
            $pesanan->update();
        }else{
            $pesanan->total_harga_pesan = $pesanan->total_harga_pesan - $pesanandetail->total_hargadet;
            $pesanan->total_harga_pesan = $pesanan->total_harga_pesan + $request->harga;
            $pesanan->Dp = $pesanan->total_harga_pesan / 2;
            $pesanan->update();
    
        }
       

        $pesanandetail->total_hargadet = $request->harga;
        if ($request->file('model_ditawarkan')) {
            $file = $request->file('model_ditawarkan');
            $pesanandetail->model_ditawarkan  = $file->getClientOriginalName();
            $tujuan_upload = 'imageup';
            $file->move($tujuan_upload, $file->getClientOriginalName());
        }
        $pesanandetail->update();


        session()->flash('message', 'Data Berhasil Diubah');
        return redirect('master_pesanan');




        // $pesanan->total_harga_pesan=$pesanan->total_harga_pesan+$request->harga;
        // $pesanan->Dp=$pesanan->total_harga_pesan/2;
        // $pesanan->update();
        // session()->flash('message', 'Data Berhasil Diubah');
        // return redirect('master_pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan_detail = PesananDetail::find($id);
        if (!empty($pesanan_detail)) {
            $pesanan = Pesanan::where('id_pesan', $pesanan_detail->pesanan_id)->first();
            $detailbahans = DetailBahan::where('pesanan_detail_id', $pesanan_detail->id_det);
            $jumlah_pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id_pesan)->count();
            if ($jumlah_pesanan_detail == 1) {
                $pesanan->delete();
            } else {
                $pesanan->total_harga_pesan = $pesanan->total_harga_pesan - $pesanan_detail->total_hargadet;
                $pesanan->Dp = $pesanan->total_harga_pesan / 2;
                $pesanan->update();
            }
            $detailbahans->delete();
            $pesanan_detail->delete();
            session()->flash('message', 'Pesanan Telah Dibatalkan');
            return redirect('master_pesanan');
        }
    }
}
