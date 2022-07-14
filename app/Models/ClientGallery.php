<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'caravan_id',
        'url',
        'public_home',
        'public_caravan',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function caravan() {
        return $this->belongsTo(Caravan::class);

    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);

    }
}
