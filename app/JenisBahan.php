<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBahan extends Model
{
    protected $fillable = [
        'nama_jenis',
        
    ];
    
    public function bahan_bakus()
    {
        return $this->hasMany(BahanBaku::class,'jenis_bahan_id','id_jenis');
    }
    protected $primaryKey = 'id_jenis';
}
