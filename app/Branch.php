<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Branch extends Model
{
    //
    protected $fillable = ['email', 'hospital_phone', 'ambulance_phone', 'fax', 'latitude', 'longitude', 'name_az',
        'name_en', 'name_ru', 'address_az', 'address_en', 'address_ru'];

//    protected $hidden = ['name_az', 'name_en', 'name_ru', 'address_az', 'address_en', 'address_ru'];

    protected $appends = ['name', 'address'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function getAddressAttribute()
    {
        return $this->{"address_" . App::getLocale()};
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }
}
