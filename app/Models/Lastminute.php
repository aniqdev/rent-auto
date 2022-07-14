<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lastminute extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'caravan_id',
        'name',
        'description',
        'discount',
        'start_date',
        'end_date',
        'started_at',
        'ended_at',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'started_at',
        'ended_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function caravan() {
        return $this->belongsTo('App\Models\Caravan');
    }

    public function scopeActive($query) {
        $now = Carbon::now()->toDateTimeString();

        return $query->where('started_at', '<=', $now);
    }
}
