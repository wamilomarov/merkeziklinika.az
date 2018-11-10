<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class MedicalDeviceCategory extends Model
{
    //
    protected $table = 'medical_device_categories';

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function devices()
    {
        return $this->hasMany(MedicalDevice::class);
    }
}
