<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\JobPost;
use App\Skill;
use App\Candidate;
use App\Http\Controllers\Controller;
class JobPostsController extends Controller
{
    
    public function index()
    {
        $posts = JobPost::paginate(15);
        return view('vendor.job-post.index',compact('posts'));
        
    }

   
    public function create()
    {
        $post = new JobPost();
        return view('vendor.job-post.form')->with(['edit'=>false,'post'=> $post]);
    }

    
    public function store(Request $request)
    {
        $post = new JobPost();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->experience = $request->experience;
        $post->country_id = $request->country;
        $post->state_id = $request->state;
        $post->city = $request->city;
        $post->salary = $request->salary;
        $post->save();

        return redirect()->route('job-post.index');
    }

   
    public function show($id)
    {
        $post = JobPost::with('skills','candidates.skills')->find($id);
        
        $skills = array();
        $candid = array();
        if(!$post->skills->isEmpty())
        {
            
            $skills = collect($post->skills)->map(function($item){
                return $item['id'];
            });
            $candidate = Candidate::with(['skills'=>function($q)use($skills){
                $q->wherePivotIn('skills_id',[1,3]);
            }])->get();
        }
        if(!$post->candidates->isEmpty())
        {
           foreach ($post->candidates as $cand) {
               array_push($candid, $cand->id); 
            } 
        }
        
        return view('vendor.job-post.show')->with(['post'=> $post,'candidate'=>$candidate,'candidate_added'=>$candid]);
        
    }

   
    public function edit($id)
    {
        $post = JobPost::find($id);

        return view('vendor.job-post.form')->with(['edit'=>false,'post'=> $post]);;
        
    }

    public function update(Request $request, $id)
    {
        $post = JobPost::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->experence = $request->experence;
        $post->country_id = $request->country_id;
        $post->state_id = $request->state_id;
        $post->city = $request->city;
        $post->salary = $request->salary;
        $post->save();

        return redirect()->route('job-post.index');
    }

    public function destroy($id)
    {
        //
    }

    public function skills($id)
    {
        $post = JobPost::with('skills')->findOrFail($id);
        $skills_added = array();
            foreach ($post->skills as $skill) {
               array_push($skills_added, $skill->id);
            }
        $skills = Skill::all();

        return view('vendor.job-post.skills',compact('skills','post','skills_added'));
    }

    public function addSkills(Request $request,$id)
    {
       $skill = JobPost::findOrFail($id);
       $skill->skills()->sync((array)$request->skills);
       return redirect()->route('job-post.show',$id);
   }   

   public function addCandidate(Request $request,$id)
    {
       $skill = JobPost::findOrFail($id);
       $skill->candidates()->sync((array)$request->candidate);
       return redirect()->route('job-post.show',$id);
   }
}
