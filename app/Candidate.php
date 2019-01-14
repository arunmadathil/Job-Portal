<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $dates = ['created_at','updated_at'];
    public $timestamps = true;
    public function skills()
    {
    	return $this->belongsToMany('App\Skill','candidate_skills','candidate_id','skills_id'); 
    }
}
