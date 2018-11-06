<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Service extends Model
{
    //

    protected $fillable = ['title_az', 'title_en', 'title_ru', 'description_az', 'description_en', 'description_ru',
        'icon_url', 'url'];

    protected $appends = ['title', 'description', 'icon'];

    public function getTitleAttribute()
    {
        return $this->{"title_" . App::getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{"description_" . App::getLocale()};
    }

    public function getIconAttribute()
    {
        return env('APP_URL') . "/uploads/images/" . $this->icon_url;
    }
}
