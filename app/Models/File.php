<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'extension',
        'size',
        'path',
        'thumbnail',
    ];

    protected $appends = [
        'photography',
    ];

    public function getPhotographyAttribute() {
        return (!empty($this->thumbnail)) ? $this->thumbnail : $this->path;
    }
}
