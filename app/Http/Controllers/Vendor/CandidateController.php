<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\Skill;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::with('skills')->paginate(15);
        
        return view('vendor.candidate.index',compact('candidates'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidate = new Candidate();
        return view('vendor.candidate.form')->with(['edit'=>false,'candidate'=> $candidate]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate = new Candidate();
        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->middle_name = $request->middle_name;
        // $candidate->title = $request->title;
        $candidate->gender = $request->gender;
        $candidate->email = $request->email;
        $candidate->dob = $request->dob;
        $candidate->years = $request->years;
        $candidate->month = $request->month;
        $candidate->mobile = $request->mobile;
        $candidate->cv_data = $request->cv_data;
        $candidate->save();

        return redirect()->route('candidate-info.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);
        return view('vendor.candidate.show',compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        return view('vendor.candidate.form')->with(['edit'=>false,'candidate'=> $candidate]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);
        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->middle_name = $request->middle_name;
        $candidate->gender = $request->gender;
        $candidate->email = $request->email;
        $candidate->dob = $request->dob;
        $candidate->years = $request->years;
        $candidate->month = $request->month;
        $candidate->mobile = $request->mobile;
        $candidate->cv_data = $request->cv_data;
        $candidate->save();

        return redirect()->route('candidate-info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function skills($id)
    {
        $candidate = Candidate::with('skills')->findOrFail($id);
        $skills_added = array();
            foreach ($candidate->skills as $skill) {
               array_push($skills_added, $skill->id);
            }
        $skills = Skill::all();
        return view('vendor.candidate.skill',compact('skills','candidate','skills_added'));
    }

    public function addSkills(Request $request,$id)
    {
       $skill = Candidate::findOrFail($id);
       $skill->skills()->sync((array)$request->skills);
       return redirect()->route('candidate-info.show',$id);
   }
}
