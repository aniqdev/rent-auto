<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CaravanAttributeCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'value',
        'description',
        'sort',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function attributes() {
        return $this->hasMany('App\Models\CaravanAttribute');
    }
}
