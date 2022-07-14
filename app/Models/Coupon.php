<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'discount',
        'active',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function reservations() {
        return $this->hasMany('App\Models\Reservation');
    }

    public function getReservationsCountAttribute() {
        return $this->reservations->where('status_id', '!=', 9)->count();
    }

    public function getDiscountSumAttribute() {
        $discount = 0;

        foreach($this->reservations->where('status_id', '!=', 9) as $reservation) {
            $discount += $reservation->base_price - $reservation->total_price;
        }

        return number_format($discount, 0, ',', ' ');
    }

    public function getLastReservationAttribute() {
        $last_reservation = $this->reservations->last();

        return (!empty($last_reservation['created_at'])) ? $last_reservation['created_at'] : '';
    }
}
