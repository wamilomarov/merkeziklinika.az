<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table = 'video_gallery_videos';

    protected $fillable = ['url'];

    public function gallery()
    {
        return $this->belongsTo(VideoGallery::class, 'gallery_id', 'id');
    }
}
