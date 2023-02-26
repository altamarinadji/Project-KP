<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'kode_produk',
        'nama_pro',
        'gambar_pro'
    ];
    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class,'product_id','id_pro');
    }
    protected $primaryKey = 'id_pro';
}
