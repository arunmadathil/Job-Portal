<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPost;

class JobPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = JobPost::paginate(15);
        return view('vendor.job-post.index',compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new JobPost();
        return view('vendor.job-post.form')->with(['edit'=>false,'post'=> $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = JobPost::find($id);
        return view('vendor.job-post.show')->with(['post'=> $post]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = JobPost::find($id);

        return view('vendor.job-post.form')->with(['edit'=>false,'post'=> $post]);;
        
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
}
