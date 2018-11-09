<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class VideoGallery extends Model
{
    //

    protected $table = 'video_gallery';

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'gallery_id', 'id');
    }

}
