<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktura extends Model
{
    use HasFactory;

    protected $fillable = [
        'faktura_number',
        'reservation_id',
        'send_first',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);

    }
}
