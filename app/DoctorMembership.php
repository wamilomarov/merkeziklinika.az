<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class DoctorMembership extends Model
{
    //
    protected $table = 'doctors_memberships';

    protected $appends = ['organization'];

    public function getOrganizationAttribute()
    {
        return $this->{"organization_" . App::getLocale()};
    }
}
