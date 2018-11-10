<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Campaign extends Model
{
    //
    protected $fillable = ['title_az', 'title_en', 'title_ru', 'text_az', 'text_ru', 'text_en', 'photo_url', 'views'];

    protected $appends = ['photo', 'title', 'text'];

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/campaigns/" . $this->photo_url;
    }

    public function getTitleAttribute()
    {
        return $this->{"title_" . App::getLocale()};
    }

    public function getTextAttribute()
    {
        return $this->{"text_" . App::getLocale()};
    }

}
