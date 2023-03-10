<?php

namespace App\Http\Livewire;


use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $jumlah = 0;

    protected $listeners = [
        'masukkeranjang'=>'updatekeranjang'
    ];

    public function updatekeranjang(){
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id_pesan)->count();
            }else{
                $this->jumlah=0;
            }
        }
    }

    public function mount()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id_pesan)->count();
            }else{
                $this->jumlah=0;
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            
            'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
