<?php

namespace App\Http\Livewire;

use App\BahanBaku;
use App\DetailBahan;
use App\Pesanan;
use App\PesananDetail;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class Pesan extends Component
{
    use WithFileUploads;
    public $jumlah_pesanan, $product, $panjang, $lebar, $tinggi, $aluminium, $kaca,$contoh_model, $triplek,$deskripsi,$dp,$warna;
    public function mount($id)
    {
        
        $productdetail = Product::find($id);
        if ($productdetail) {
            $this->product = $productdetail;
        }
        if(!Auth::user()){
            return redirect()->route('login');
        }
    }

    public function masukkankeranjang()
    {
      
        $this->validate([
            'jumlah_pesanan' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            'aluminium' => 'required'
        ]);

        //VALIDASI JIKA BELUM LOGIN
        if (!Auth::User()) {
            return redirect()->route('login');
        }

        //Menghitung total harga
        


        //CEK APAKAH USER PUNYA PESANAN UTAMA YANG STATUSNYA 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        
        //Menyimpan/update data pesanan utama
        if (empty($pesanan)) {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'Dp'=>$this->dp,
                'status' => 0,
                'kode_unik' => mt_rand(1, 100),
            ]);
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'DA-' . $pesanan->id_pesan;
            $pesanan->update();
        } 

        //memasukkan data pesanan detail
        
        if($this->contoh_model!=""){
            $this->contoh_model->store('public/imageup');
            PesananDetail::create([
                'product_id' => $this->product->id_pro,
                'pesanan_id' => $pesanan->id_pesan,
                'jumlah_pesanan' => $this->jumlah_pesanan,
                'total_hargadet' => 0,
                'panjang' => $this->panjang,
                'lebar' => $this->lebar,
                'tinggi' => $this->tinggi,
                'Warna' => $this->warna,
                'deskripsi' => $this->deskripsi,
                'contoh_model'=>$this->contoh_model->hashname(),
            ]);
        }else{
            PesananDetail::create([
                'product_id' => $this->product->id_pro,
                'pesanan_id' => $pesanan->id_pesan,
                'jumlah_pesanan' => $this->jumlah_pesanan,
                'total_hargadet' => 0,
                'panjang' => $this->panjang,
                'lebar' => $this->lebar,
                'tinggi' => $this->tinggi,
                'Warna' => $this->warna,
                'deskripsi' => $this->deskripsi,
                
            ]);
        }
       
        

        //memasukkan data detail bahan
        $pesanan_detail = PesananDetail::orderBy('created_at', 'desc')->first();
        $alu = BahanBaku::where('nama_bb', $this->aluminium)->first();
        $kaca = BahanBaku::where('nama_bb', $this->kaca)->first();
        $triplek = BahanBaku::where('nama_bb', $this->triplek)->first();
        if ($this->kaca =="" && $this->triplek =="") {
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $alu->id_bb,
                'nama_detbah' => $this->aluminium
            ]);
        } elseif ($this->kaca =="") {
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $alu->id_bb,
                'nama_detbah' => $this->aluminium
            ]);
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $triplek->id_bb,
                'nama_detbah' => $this->triplek
            ]);
        } elseif ($this->triplek =="") {
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $alu->id_bb,
                'nama_detbah' => $this->aluminium
            ]);
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $kaca->id_bb,
                'nama_detbah' => $this->kaca
            ]);
        } else {
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $alu->id_bb,
                'nama_detbah' => $this->aluminium
            ]);
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $kaca->id_bb,
                'nama_detbah' => $this->kaca
            ]);
            DetailBahan::create([
                'pesanan_detail_id' => $pesanan_detail->id_det,
                'bahan_baku_id' => $triplek->id_bb,
                'nama_detbah' => $this->triplek
            ]);
        }


        $this->emit('masukkeranjang');

        session()->flash('message', 'Sukses Masuk Keranjang');

        return redirect()->route('keranjang');
    }
    public function render()
    {
        $aluminiums = BahanBaku::where('jenis_bahan_id', '1')->get();
        $kacas = BahanBaku::where('jenis_bahan_id', '2')->get();
        $tripleks = BahanBaku::where('jenis_bahan_id', '3')->get();

        if ($this->jumlah_pesanan == "") {
            $jumlah_pesanan = 0;
        } else {
            $jumlah_pesanan = $this->jumlah_pesanan;
        }
       

       

        $jumlah_pesan = $jumlah_pesanan;
        return view('livewire.pesan', [
            'aluminiums' => $aluminiums,
            'kacas' => $kacas,
            'tripleks' => $tripleks,
            'jumlah_pesan' => $jumlah_pesan,
            

        ]);
    }
}
