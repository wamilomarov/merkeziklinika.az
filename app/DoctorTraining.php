<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class DoctorTraining extends Model
{
    //
    protected $table = 'doctors_trainings';

    protected $appends = ['name', 'address'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function getAddressAttribute()
    {
        return $this->{"address_" . App::getLocale()};
    }
}
