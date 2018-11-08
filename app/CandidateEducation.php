<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
    //
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
