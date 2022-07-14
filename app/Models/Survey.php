<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'recense_caravan',
        'recense_service',
        'public',
        'public_caravan',
        'rating_service',
        'rating_caravan',
        'url',
        'reservation_id',
        'carvan_id',
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
