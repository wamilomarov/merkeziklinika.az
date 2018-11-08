<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class DoctorEducation extends Model
{
    //
    protected $table = 'doctors_educations';

    protected $fillable = ['major_az', 'major_en', 'major_ru', 'name_az', 'name_en', 'name_ru', 'address_az', 'address_en',
        'address_ru', 'start', 'end', 'doctor_id'];

    protected $appends = ['name', 'address', 'major'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function getAddressAttribute()
    {
        return $this->{"address_" . App::getLocale()};
    }

    public function getMajorAttribute()
    {
        return $this->{"major_" . App::getLocale()};
    }
}
