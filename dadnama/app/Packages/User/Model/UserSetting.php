<?php

namespace App\Packages\User\Model;

use App\Packages\Network\Model\Network;
use App\Packages\Photo\Model\Photo;
use App\Packages\Skill\Model\UserSkill;
use App\Packages\Template\Model\AboutTemplate;
use App\Packages\Template\Model\CourtCases;
use App\Packages\Template\Model\Educationales;
use App\Packages\Template\Model\Resume;
use App\Packages\Template\Model\Statistic;
use App\Packages\Template\Model\UserSegmentTemplate;
use App\Packages\Template\Model\UserTemplate;
use App\Packages\Tools\Extend\Entity;

class UserSetting extends Entity
{
    protected $table = 'user_settings';
    protected $fillable = ['id', 'user_id', 'domain', 'type', 'created_at', 'updated_at'];
    public $timestamps = false;

    public static function searchDomain($d, $t = -1)
    {
        $en = self::where('domain', $d);
        if ($t == -1) {
            $en->where('type', $t);
        }
        return $en->first() && true;
    }

    public function user_temp()
    {
        return $this->belongsTo(UserTemplate::class, 'user_id', 'user_id')->has('template');
    }

    public function about()
    {
        return $this->belongsTo(AboutTemplate::class, 'user_id', 'user_id');
    }

    public function segment()
    {
        return $this->hasMany(UserSegmentTemplate::class, 'user_id', 'user_id');
    }

    public function networks()
    {
        return $this->hasMany(Network::class, 'user_id', 'user_id');
    }


    public function skill()
    {
        return $this->hasMany(UserSkill::class, 'user_id', 'user_id');
    }


    public function court_cases()
    {
        return $this->hasMany(CourtCases::class, 'user_id', 'user_id');
    }


    public function statistic()
    {
        return $this->hasMany(Statistic::class, 'user_id', 'user_id');
    }


    public function resume()
    {
        return $this->hasMany(Resume::class, 'user_id', 'user_id');
    }

    public function educationales()
    {
        return $this->hasMany(Educationales::class, 'user_id', 'user_id');
    }


    public function photo()
    {
        return $this->hasMany(Photo::class, 'user_id', 'user_id');
    }

}
