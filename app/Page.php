<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Page extends Model
{
    //
    protected $appends = ['name', 'text'];

    public function getNameAttribute()
    {
        return $this->{"name_" . App::getLocale()};
    }

    public function getTextAttribute()
    {
        return $this->{"text_" . App::getLocale()};
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id');
    }

    public function slides()
    {
        return $this->hasMany(PageSlide::class);
    }
}
