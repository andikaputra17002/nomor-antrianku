<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamPraktek extends Model
{
    use HasFactory;

    protected $fillable = [
        'jam_praktek_pagi',
        'jam_praktek_malam',
        'hari_praktek_id'
    ];
    protected $table = "jam_prakteks";
    // protected $guarded = [];
    public function hari_praktek()
    {
        return $this->belongsTo(hari_praktek::class, 'hari_praktek_id', 'id');
    }
}
