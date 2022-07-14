<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'birthdate',
        'phone',
        'address',
        'city',
        'zip',
        'company',
        'ico',
        'dic',
        'discount',
        'password',
        'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',
    ];

    public function coupons() {
        return $this->belongsToMany('App\Models\Coupon');
    }

    public function accessories() {
        return $this->belongsToMany('App\Models\Accessory');
    }

    public function reservations() {
        return $this->hasMany('App\Models\Reservation');
    }

    // public function notes() {
    //     return $this->hasMany(Notes::class);
    // }

    public function getInitialsAttribute() {
        return mb_substr($this->name, 0, 1) . mb_substr($this->last_name, 0, 1);
    }

    public function getReservationsDiscountAttribute() {
        $status = Status::where('name', 'Vráceno')->first();
        $reservations = $this->reservations->where('status_id', $status->id);
        $count_of_reservations = 0;
        $discount = $this->discount;

        foreach($reservations as $reservation) {
            $start_date = $reservation->start_date;
            $end_date = $reservation->end_date;

            if($start_date->diffInDays($end_date) >= 7) {
                $count_of_reservations++;
            }
        }

        if($count_of_reservations > 0 && !boolval($this->admin)) {
            if($count_of_reservations == 1) {
                $discount = 5;
            } elseif($count_of_reservations >= 2) {
                $discount  = 10;
            }
        }

        return ($discount > $this->discount) ? $discount : $this->discount;
    }
}
