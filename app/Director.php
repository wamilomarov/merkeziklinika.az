<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Director extends Model
{
    //
    protected $appends = ['photo', 'position', 'full_name', 'title'];

    public function getFullNameAttribute()
    {
        return $this->{"full_name_" . App::getLocale()};
    }

    public function getPositionAttribute()
    {
        return $this->{"position_" . App::getLocale()};
    }

    public function getTitleAttribute()
    {
        return $this->{"title_" . App::getLocale()};
    }

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/directors/" . $this->photo_url;
    }
}
