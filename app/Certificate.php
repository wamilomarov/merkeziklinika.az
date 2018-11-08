<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //
    protected $fillable = ['photo_url', 'doctor_id'];

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/certificates/" . $this->photo_url;
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
