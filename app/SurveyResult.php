<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    //

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
