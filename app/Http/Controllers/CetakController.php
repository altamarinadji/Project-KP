<?php

namespace App\Http\Controllers;

use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\PesananDetail;
use PDF;

class CetakController extends Controller
{
    public function cetak($id)
    {
        if (Auth::user()) {
            $this->pesanan = DB::table('pesanans')
            ->join('users', 'users.id', '=', 'pesanans.user_id')->where('user_id', Auth::user()->id)->where('id_pesan', $id)->first();
            $this->pesanantgl = Pesanan::where('user_id', Auth::user()->id)->where('id_pesan', $id)->first();
            
                $this->pesanan_details = DB::table('pesanan_details')
                ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
                ->join('products', 'products.id_pro', '=', 'pesanan_details.product_id')
                ->where('pesanan_details.pesanan_id', $this->pesanan->id_pesan)
                ->get();;

                $this->detail_bahans = DB::table('detail_bahans')
                    ->join('pesanan_details', 'pesanan_details.id_det', '=', 'detail_bahans.pesanan_detail_id')
                    ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
                    ->where('pesanan_details.pesanan_id', $this->pesanan->id_pesan)
                    ->get();
              
            
            $pdf = PDF::loadview("livewire/cetak", [
                'pesanan' => $this->pesanan,
                'pesanan_details' => $this->pesanan_details,
                'detail_bahans' => $this->detail_bahans,
                'tgl'=> $this->pesanantgl,
            ]);
            return $pdf->download("kwitansi.pdf");
        }
    }
}
