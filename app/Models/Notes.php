<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'reservation_id',
        'note',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);

    }

}
