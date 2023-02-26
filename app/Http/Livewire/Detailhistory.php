<?php

namespace App\Http\Livewire;

use App\Pesanan;
use Livewire\Component;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class Detailhistory extends Component
{
    protected $pesanan;
    protected $pesananid;
    public $idpes;
    protected $detail_bahans = [];
    protected $pesanan_details = [];
    public function mount($id)
    {
        $pesananid = Pesanan::find($id);
        if ($pesananid) {
            $this->idpes = $pesananid->id_pesan;
        }
    }
  
    public function render()
    {
        if (Auth::user()) {
            $this->pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id_pesan', $this->idpes)->first();

            if ($this->pesanan) {
                $this->pesanan_details = PesananDetail::where('pesanan_id', $this->pesanan->id_pesan)->get();

                $this->detail_bahans = DB::table('detail_bahans')
                    ->join('pesanan_details', 'pesanan_details.id_det', '=', 'detail_bahans.pesanan_detail_id')
                    ->join('pesanans', 'pesanans.id_pesan', '=', 'pesanan_details.pesanan_id')
                    ->where('pesanan_details.pesanan_id', $this->pesanan->id_pesan)
                    ->get();
            }
        }
        return view('livewire.detailhistory', [
            'pesanan' => $this->pesanan,
            'pesanan_details' => $this->pesanan_details,
            'detail_bahans' => $this->detail_bahans,

        ]);
    }
}
