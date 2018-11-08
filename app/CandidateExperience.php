<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateExperience extends Model
{
    //
    public function resume()
    {
        $this->belongsTo(Resume::class);
    }
}
