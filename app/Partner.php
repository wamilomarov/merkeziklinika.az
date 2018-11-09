<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Partner extends Model
{
    //
    protected $appends = ['name', 'photo'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/partners/" . $this->photo_url;
    }
}
