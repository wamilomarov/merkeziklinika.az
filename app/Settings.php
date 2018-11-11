<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Settings extends Model
{
    //
    protected $table = 'settings';

    protected $fillable = ['email', 'facebook', 'linkedin', 'instagram', 'youtube', 'hospital_phone', 'ambulance_phone',
        'dentistry_phone', 'family_health_phone', 'latitude', 'longitude', 'address_az', 'address_en', 'address_ru',
        'short_about_us_heading_az', 'short_about_us_heading_en', 'short_about_us_heading_ru', 'short_about_us_text_az',
        'short_about_us_text_en', 'short_about_us_text_ru', 'logo_url'];

    protected $appends = ['address', 'short_about_us_heading', 'short_about_us_text', 'logo'];

    public function getAddressAttribute()
    {
        return $this->{"address_" . App::getLocale()};
    }

    public function getShortAboutUsHeadingAttribute()
    {
        return $this->{"short_about_us_heading_" . App::getLocale()};
    }

    public function getShortAboutUsTextAttribute()
    {
        return $this->{"short_about_us_text_" . App::getLocale()};
    }

    public function getLogoAttribute()
    {
        return env("STORAGE_URL") . $this->logo_url;
    }
}
