<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Doctor extends Model
{
    //
    protected $fillable = ['full_name_az', 'full_name_en', 'full_name_ru', 'photo_url', 'department_id', 'position_id',
        'major_id', 'facebook', 'instagram', 'linkedin', 'youtube', 'bio_az', 'bio_en', 'bio_ru', 'is_guest'];

    protected $appends = ['photo', 'full_name', 'bio'];

    public function getFullNameAttribute()
    {
        return $this->{"full_name_" . App::getLocale()};
    }

    public function getBioAttribute()
    {
        return $this->{"bio_" . App::getLocale()};
    }

    public function getPhotoAttribute()
    {
        return env('APP_URL') . "/uploads/images/doctors/" . $this->photo_url;
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function educations()
    {
        return $this->hasMany(DoctorEducation::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'doctors_languages');
    }

    public function experiences()
    {
        return $this->hasMany(DoctorExperience::class);
    }

    public function articles()
    {
        return $this->hasMany(DoctorArticles::class);
    }

    public function trainings()
    {
        return $this->hasMany(DoctorTraining::class);
    }

    public function memberships()
    {
        return $this->hasMany(DoctorMembership::class);
    }

    public function medical_articles()
    {
        return $this->hasMany(MedicalArticle::class);
    }

    public function web_articles()
    {
        $this->hasMany(Article::class);
    }


}
