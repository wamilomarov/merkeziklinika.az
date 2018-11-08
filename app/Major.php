<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Major extends Model
{
    //
    protected $fillable = ['name_az', 'name_en', 'name_ru'];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
