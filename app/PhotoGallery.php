<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class PhotoGallery extends Model
{
    //
    protected $table = 'photo_gallery';

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'gallery_id', 'id');
    }
}
