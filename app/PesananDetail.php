<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    protected $fillable = [
        'jumlah_pesanan',
        'total_hargadet',
        'panjang',
        'lebar',
        'tinggi',
        'Warna',
        'deskripsi',
        'contoh_model',
        'model_ditawarkan',
        'revisi',
        'bahan_baku_id',
        'product_id',
        'pesanan_id',
    ];


    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id_pesan');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_pro');
    }
    public function detail_bahans()
    {
        return $this->hasMany(DetailBahan::class,'pesanan_detail_id','id_det');
    }
    protected $primaryKey = 'id_det';
}
