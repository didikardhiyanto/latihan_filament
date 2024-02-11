<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_jenis',
        'guest',
        'tanggal_checkin',
        'tanggal_checkout',
        'pax',
        'id_room'
    ];
}
