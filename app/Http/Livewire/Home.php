<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Home extends Component 
{
    
    public function render()
    {
        $products = Product::paginate(4);
        return view('livewire.home',[
            'products'=> $products,
            
        ]);
    }
}
