<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'dokter_id',
        'jam_praktek_id',
        'shiff',
        'tanggal_pendaftaran',
        'transaksi',
        'antrian',
        'keluhan',
        'status',
    ];
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id');
    }

    public function jam_praktek()
    {
        return $this->hasOne(JamPraktek::class, 'id', 'jam_praktek_id');
    }
    
}
