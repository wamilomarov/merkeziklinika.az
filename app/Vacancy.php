<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Vacancy extends Model
{
    //
    protected $table = 'vacancies';

    protected $appends = ['position'];

    public function getPositionAttribute()
    {
        return $this->{"position_" . App::getLocale()};
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
