<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateKnownPersonal extends Model
{
    //
    protected $table = 'create_candidate_known_personal';

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
