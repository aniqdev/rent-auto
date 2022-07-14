<?php

namespace App\Models;

use App\Http\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessory extends Model
{
    use HasFactory, FileTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'thumbnail',
        'price_per_day',
        'access_charge',
        'max_count',
        'stock',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'max_count_array',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function reservations() {
        return $this->belongsToMany('App\Models\Reservation', 'reservation_accessory')
            ->withPivot('count')
            ->withTrashed();
    }

    public function getMaxCountArrayAttribute() {
        $values = [];

        for($i = 1; $i <= $this->max_count; $i++) {
            $values[$i] = $i . ' ks';

        }
        // dd($values);
        return $values;
    }
}
