<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //

    public function educations()
    {
        return $this->hasMany(CandidateEducation::class);
    }

    public function languages()
    {
        return $this->hasMany(CandidateLanguage::class);
    }

    public function softwares()
    {
        return $this->hasMany(CandidateSoftware::class);
    }

    public function experiences()
    {
        return $this->hasMany(CandidateExperience::class);
    }

    public function relatives()
    {
        return $this->hasMany(CandidateRelative::class);
    }

    public function known_personal()
    {
        $this->hasMany(CandidateKnownPersonal::class);
    }


}
