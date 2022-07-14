<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
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
        'description',
        'flag',
        'priority',
        'started_at',
        'ended_at',
        'min_price',
        'min_days',
        'max_days',
        'quantity',
        'start_date',
        'end_date',
        'caravan_restriction',
        'register_restriction',
        'reduction_percent',
        'reduction_amount',
        'reduction_days',
        'active',
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

    public function caravans() {
        return $this->belongsToMany('App\Models\Caravan');
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function getRules($start_date, $end_date, $price) {
        //$start_date = Carbon::createFromFormat('Y-m-d', $start_date)->toDateString();
        $current_date = Carbon::now()->format('Y-m-d');

        $rule = Discount::with(['caravans'])
            ->where(function($q) use ($current_date) {
                $q->where('started_at', '>=', $current_date)
                ->where('ended_at', '<=', $current_date);
            })->where('started_at', '>=', $current_date)
            ->where('ended_at', '<=', $current_date)
            ->orderBy('priority', 'ASC')
            ->first();
    }
}
