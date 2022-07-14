<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveForm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'caravan_id',
        'email',
        'start_date',
        'end_date',
        'price',
        'reason',
        'message',
        'visited_at',
    ];

    protected $dates = [
        'visited_at',
        'created_at',
        'updated_at',
    ];

    static protected $reasons = [
        1 => 'Ještě se chci rozmyslet',
        2 => 'Vysoká cena pronájmu',
        3 => 'Nedostatek příslušenství',
        4 => 'Jiné',
    ];

    public static function getReasons() {
        return collect(self::$reasons);
    }

    public function caravan() {
        return $this->belongsTo('App\Models\Caravan');
    }
}
