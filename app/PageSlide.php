<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSlide extends Model
{
    //

    protected $table = 'article_sliders';

    protected $appends = ['photo'];

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/pages_slides/" . $this->photo_url;
    }
}
