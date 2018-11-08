<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SocialNews extends Model
{
    //
    protected $table = 'social_news';

    protected $appends = ['title'];

    public function getTitleAttribute()
    {
        return $this->{"title_" . App::getLocale()};
    }
}
