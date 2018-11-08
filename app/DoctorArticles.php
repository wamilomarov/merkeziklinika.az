<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class DoctorArticles extends Model
{
    //
    protected $table = 'doctors_articles';

    protected $appends = ['name', 'authors', 'publication'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function getAuthorsAttribute()
    {
        return $this->{"authors_" . App::getLocale()};
    }

    public function getPublicationAttribute()
    {
        return $this->{"publication_" . App::getLocale()};
    }
}
