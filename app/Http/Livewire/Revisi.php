<?php

namespace App\Http\Livewire;

use App\PesananDetail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Revisi extends Component
{
    use WithFileUploads;
    public $revisi, $contoh_model, $pesanandetailini, $idpesdet;
    public function mount($id)
    {
        $pesanandetailini = PesananDetail::find($id);
        if ($pesanandetailini) {
            $this->idpesdet = $pesanandetailini->id_det;
        }
    }
    public function revisi()
    {
       
        if ($this->contoh_model!="") {
            $this->contoh_model->store('public/imageup');
            PesananDetail::where('id_det',$this->idpesdet )->update([
                'revisi' => $this->revisi,
                'contoh_model'=>$this->contoh_model->hashname(),
            ]);
        }else{
            PesananDetail::where('id_det',$this->idpesdet )->update([
                'revisi' => $this->revisi,
               
            ]); 
        }
        
        return redirect('keranjang');
    }
    public function render()
    {
        return view('livewire.revisi');
    }
}
