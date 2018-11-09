<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'photo_gallery_photos';

    protected $fillable = ['photo_url'];

    protected $appends = ['photo'];

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/galleries/" . $this->photo_url;
    }

    public function gallery()
    {
        return $this->belongsTo(PhotoGallery::class, 'gallery_id', 'id');
    }
}
