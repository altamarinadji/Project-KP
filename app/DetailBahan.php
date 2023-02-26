<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBahan extends Model
{
    protected $fillable = [
        'nama_detbah',
        'bahan_baku_id',
        'pesanan_detail_id',
    ];
    public function bahan_baku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id', 'id_bb');
    }
    public function pesanan_detail()
    {
        return $this->belongsTo(PesananDetail::class,'pesanan_detail_id','id_det');
    }
    protected $primaryKey = 'id_detbah';
}
