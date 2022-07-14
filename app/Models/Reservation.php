<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_id',
        'user_id',
        'coupon_id',
        'caravan_id',
        'start_date',
        'end_date',
        'name',
        'last_name',
        'birthdate',
        'phone',
        'email',
        'address',
        'city',
        'zip',
        'company',
        'ico',
        'dic',
        'comment',
        'discount',
        'base_deposit',
        'base_price',
        'accessories_price',
        'total_price',
        'payment_method',
        'ordered_by',
        '35_before_depatr',
        '30_before_depatr',
        'rest_pay_date',
        'deposite_date',
        'total_pay_date',
        'total_counter',
        'deposite_counter',
        'rest_counter',
        'review_sended',
        'review_block',

    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'rest_pay_date',
        'deposite_date',
    ];



    public function status() {
        return $this->belongsTo('App\Models\Status')
            ->withTrashed();
    }

    public function coupon() {
        return $this->belongsTo('App\Models\Coupon');
    }

    public function caravan() {
        return $this->belongsTo('App\Models\Caravan')
            ->withTrashed();
    }

    public function accessories() {
        return $this->belongsToMany('App\Models\Accessory', 'reservation_accessory')
            ->withPivot('count')
            ->withTrashed();
    }

    public function user() {
        return $this->belongsTo('App\Models\User')
            ->withTrashed();
    }

    public function notes()
    {
       return $this->hasMany(Notes::class)->orderByDesc('created_at');
    }

    public function reviews()
    {
       return $this->hasMany(Review::class)->orderByDesc('created_at');
    }

    public function client_gallary()
    {
       return $this->hasMany(ClientGallery::class)->orderByDesc('created_at');
    }

    public function surveys()
    {
       return $this->hasMany(Survey::class)->orderByDesc('created_at');
    }

    /* public function history() {
        return $this->belongsToMany('App\Models\History', 'reservation_history')
            ->withPivot('value');
    } */

    public function getCustomerNameAttribute() {
        if(!empty($this->name) && !empty($this->last_name)) {
            $name = $this->name . ' ' . $this->last_name;
        } else {
            $name = Auth::user()->name;
        }

        return $name;
    }

    public function getPaymentAttribute() {
        switch($this->payment_method) {
            case 'cash':
                return 'Platba v hotovosti';
                break;

            case 'bankwire':
                return 'Platba bankovním převodem';
                break;
        }
    }

    public function getDaysToStartAttribute() {
        $start_date = Carbon::parse($this->start_date);

        return Carbon::now()->diffInDays($start_date, false);
    }

    public function getDaysFromCreatedAttribute(){
        $created_at = Carbon::parse($this->created_at);
        $start_date = Carbon::parse($this->start_date);

        return $created_at->diffInDays($start_date, false);
    }

    // public function setDepositeDateAtAttribute($date)
    // {
    //     $this->attributes['deposite_date'] = Carbon::updateFromFormat('Y-m-d H:i:s', $date);
    // }

    // public function setRestPayDateAtAttribute($date)
    // {
    //     $this->attributes['rest_pay_date'] = Carbon::updateFromFormat('Y-m-d H:i:s', $date);
    // }

    public function sameDate()
    {
       return (!is_null($this->deposite_date) &&
        !is_null($this->rest_pay_date) &&
        $this->deposite_date->format('Y-m-d H:i:s') === $this->rest_pay_date->format('Y-m-d H:i:s'));
    }
}
