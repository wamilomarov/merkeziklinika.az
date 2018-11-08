<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateRelative extends Model
{
    //
    public function resume()
    {
        $this->belongsTo(Resume::class);
    }
}
