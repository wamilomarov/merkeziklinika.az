<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Department extends Model
{
    //
    protected $fillable = ['name_az', 'name_en', 'name_ru', 'information_az', 'information_en', 'information_ru'];

    protected $appends = ['name', 'information'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function getInformationAttribute()
    {
        return $this->{"information_" . App::getLocale()};
    }
}
