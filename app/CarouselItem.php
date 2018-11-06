<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class CarouselItem extends Model
{
    //
    protected $fillable = ['url', 'order', 'title_az', 'title_en', 'title_ru', 'description_az', 'description_en', 'description_ru',
        'button_text_az', 'button_text_en', 'button_text_ru', 'photo_url'];

    protected $appends = ['title', 'description', 'button_text', 'photo'];

    public function getTitleAttribute()
    {
        return $this->{"title_" . App::getLocale()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{"description_" . App::getLocale()};
    }

    public function getButtonTextAttribute()
    {
        return $this->{"button_text_" . App::getLocale()};
    }

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/carousel/" . $this->photo_url;
    }


}
