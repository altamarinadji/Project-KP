<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    protected $fillable = [
        'nama_bb',
        'jenis_bahan_id',
    ];

    public function detail_bahans()
    {
        return $this->hasMany(DetailBahan::class,'bahan_baku_id','id_bb');
    }
    public function jenis_bahan()
    {
        return $this->belongsTo(JenisBahan::class, 'jenis_bahan_id', 'id_jenis');
    }
    protected $primaryKey = 'id_bb';
}
