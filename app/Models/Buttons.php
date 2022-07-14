<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buttons extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reservation_id',
        'action',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user() {
        return $this->belongsTo(User::class);

    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);

    }
}
