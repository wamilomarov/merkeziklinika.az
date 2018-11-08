<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateSoftware extends Model
{
    //
    public function resume()
    {
        $this->belongsTo(Resume::class);
    }
}
