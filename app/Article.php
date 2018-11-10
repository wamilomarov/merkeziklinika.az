<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Article extends Model
{
    //
    protected $appends = ['title', 'body', 'photo'];

    public function getTitleAttribute()
    {
        return $this->{"title_" . App::getLocale()};
    }

    public function getBodyAttribute()
    {
        return $this->{"body_" . App::getLocale()};
    }

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/articles/" . $this->photo_url;
    }

    public function doctor()
    {
        $this->belongsTo(Doctor::class);
    }
}
