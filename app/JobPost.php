<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
	protected $date=['created_at','updated_at'];
	public $timestamps = true;
    public function skills()
    {
    	return $this->belongsToMany('App\Skill','job_post_skills','job_posts_id','skills_id'); 
    }

    public function candidates()
    {
    	return $this->belongsToMany('App\Candidate','job_post_candidates','job_post_id','candidate_id'); 
    }
}
