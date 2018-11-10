<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class MedicalDevice extends Model
{
    //
    protected $table = 'medical_devices';

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function category()
    {
        return $this->belongsTo(MedicalDeviceCategory::class);
    }


}
