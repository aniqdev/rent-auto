<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'type',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    public function getDateRangeStringAttribute() {
        return $this->start_date->format('d.m') . ' - ' . $this->end_date->format('d.m.Y');
    }

    public function getInitialAttribute() {
        return str_replace('Sezóna ', '', $this->name);
    }
}
