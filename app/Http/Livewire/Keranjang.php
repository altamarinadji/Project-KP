<?php

namespace App\Http\Livewire;

use App\DetailBahan;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Keranjang extends Component
{
    // public $detail_id;
    protected $pesanan;
    protected $iddetail;
    protected $belumharga;
    protected $detail_bahans = [];
    protected $pesanan_details = [];

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
        }
        $this->emit('masukkeranjang');

        session()->flash('message', 'Pesanan Berhasil Dibatalkan');
    }

    public function render()
    {
        if (Auth::user()) {
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

            if ($this->pesanan) {
                $this->pesanan_details = PesananDetail::where('pesanan_id', $this->pesanan->id_pesan)->get();

                $this->detail_bahans = DB::table('detail_bahans')
                    ->join('pesanan_details', 'pesanan_details.id_det', '=', 'detail_bahans.pesanan_detail_id')
                    ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
                    ->where('pesanan_details.pesanan_id', $this->pesanan->id_pesan)
                    ->get();

                $this->belumharga = DB::table('pesanan_details')
                    ->select(DB::raw('count(total_hargadet) as belumharga'))->where('total_hargadet',0)->where('pesanan_details.pesanan_id', $this->pesanan->id_pesan)
                    ->first();
                // $this->belumharga = PesananDetail::where('pesanan_id', $this->pesanan->id_pesan)->where('total_hargadet', 0)->count();
            }
        }

        return view('livewire.keranjang', [
            'pesanan' => $this->pesanan,
            'pesanan_details' => $this->pesanan_details,
            'detail_bahans' => $this->detail_bahans,
            'belum_harga' => $this->belumharga,
        ]);
    }
}
