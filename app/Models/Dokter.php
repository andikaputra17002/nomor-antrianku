<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokter',
        'photo_dokter',
        'bidang_dokter',
        // 'hari_praktek_id',
        // 'jam_praktek_id',
        'code',
    ];

    public function pendaftaran(){
        return $this->hasMany(pendaftaran::class, 'dokter_id', 'id');
    }
    // public function jam_praktek(){
    //     return $this->hasMany(JamPraktek::class, 'jam_praktek_id', 'id');
    // }
    public function hari_praktek(){
        return $this->hasMany(hari_praktek::class, 'hari_praktek_id', 'id');
    }

}
