<?php

namespace App\Models;

use App\Traits\HasMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use stdClass;

class Caravan extends Model
{
    use HasFactory, HasMeta, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'caravan_category_id',
        'user_id',
        'title',
        'name',
        'short_description',
        'description',
        'thumbnail',
        'video',
        'platform',
        'concern',
        'spz',
        'model',
        'type',
        'year',
        'width',
        'height',
        'length',
        'weight',
        'climatization',
        'platform',
        'color',
        'motor',
        'power',
        'emission',
        'transmission',
        'fuel_tank',
        'security',
        'cruise_control',
        'electric_equipment',
        'audio_video',
        'beds',
        'seats',
        'heating',
        'fridge_volume',
        'hotplate',
        'basin',
        'shower',
        'toilet',
        'water_tank',
        'waste_tank',
        'bike_carrier',
        'awning',
        'blinds',
        'converter',
        'outdoor_lights',
        'highway_sign',
        'furniture',
        'winter',
        'tenerife',
        'key_benefits',
        'conditions',
        'specifications',
        'cabin',
        'residential',
        'additional',
        'services',
        'accessories',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'sort',
        'active',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'earnings'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function reservations() {
        return $this->hasMany('App\Models\Reservation');
    }

    public function caravan_category() {
        return $this->belongsTo('App\Models\CaravanCategory');
    }

    public function tabs() {
        return $this->belongsToMany('App\Models\CaravanTab', 'caravan_caravan_tab')
            ->withPivot(['text'])
            ->orderBy('sort', 'ASC');
    }

    public function seasons() {
        return $this->belongsToMany('App\Models\Season')
            ->withPivot(['day_1', 'day_2', 'day_3', 'day_4', 'day_5', 'day_6', 'day_7']);
    }

    public function photos() {
        return $this->belongsToMany('App\Models\File', 'caravan_files')
            ->withPivot('sort')
            ->orderBy('sort', 'ASC');
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getPriceFromAttribute() {
        $season = $this->seasons()->orderBy('day_1', 'ASC')->first();

        return $season->pivot->day_1 ?? 0;
    }

    public function getSeasonPriceFrom($season_name) {
        $season = $this->seasons()->where('name', $season_name)->orderBy('day_1', 'desc')->first();

        return $season->pivot->day_1 ?? 0;
    }

    public function getSeasonById($season_id) {
        return $this->seasons()->where('id', $season_id)->first();
    }

    public function getTabById($tab_id) {
        return $this->tabs()->where('id', $tab_id)->first();
    }

    public function getEarningsAttribute() {
        $sum = 0;

        foreach($this->reservations->where('status_id', '!=', 9) as $reservation) {
            $sum += $reservation->total_price;
        }

        return number_format($sum, 0, ',', ' ');
    }

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function reviews()
    {
       return $this->hasMany(Review::class)->orderByDesc('created_at');
    }

    public function reviews_public()
    {
       return $this->hasMany(Review::class)->where('public_caravan', 1);
    }

    public function client_gallary()
    {
       return $this->hasMany(ClientGallery::class)->orderByDesc('created_at');
    }
}
