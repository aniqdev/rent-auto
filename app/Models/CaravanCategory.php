<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CaravanCategory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'count_name',
        'license',
        'persons_range',
        'bike_count',
        'shower',
        'toilet',
        'short_description',
        'description',
        'thumbnail',
        'video',
        'sort',
    ];

    protected $appends = [
        'earnings'
    ];

    public function caravans() {
        return $this->hasMany('App\Models\Caravan');
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getEarningsAttribute() {
        $sum = 0;

        foreach($this->caravans as $caravan) {
            foreach($caravan->reservations->where('status_id', '!=', 9) as $reservation) {
                $sum += $reservation->total_price;
            }
        }

        return number_format($sum, 0, ',', ' ');
    }
}
