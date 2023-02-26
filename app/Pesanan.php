<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'kode_pemesanan',
        'status',
        'total_harga_pesan',
        'kode_unik',
        'user_id',
        'Dp',
    ];

    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class,'pesanan_id','id_pesan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $primaryKey = 'id_pesan';
}
