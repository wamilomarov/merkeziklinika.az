<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class DocumentForm extends Model
{
    //
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }
}
