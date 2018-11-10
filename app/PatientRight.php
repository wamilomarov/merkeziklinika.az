<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class PatientRight extends Model
{
    //
    protected $appends = ['title', 'body'];

    public function getTitleAttribute()
    {
        return $this->{"title_" . App::getLocale()};
    }

    public function getBodyAttribute()
    {
        return $this->{"body_" . App::getLocale()};
    }
}
