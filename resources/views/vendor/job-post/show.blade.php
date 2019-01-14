@extends('layouts.app')
@push("css")
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom-style.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Job Post Details</h4></div>
                <div class="panel-body">
                   <div class="">
                    <div class="col-md-8">
                       <div class=" profile">
                        <div class="col-sm-12">
                            <div class="col-xs-12 col-sm-4 text-center">
                                <div class="overlay"></div>
                                <div class="">
                                    <img src="{{ asset('image/company_profile.png') }}" style="width:180px;height:150px;" class="img-circle" alt="Avatar"> 
                                    <h3 class="name"></h3>

                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <h2>{{ $post->title }}</h2>
                                <p><strong>Company:</strong>Linkdin  ,sunnyval ,CA </p>
                                <p><strong>Posted: </strong> {{ $post->created_at->diffForHumans() }} </p>
                                
                                <hr>
                            </div> 

                        </div>            

                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Primary Skills:</h4>

                                <p>
                                    @if(!$post->skills->isEmpty())
                                    @foreach ($post->skills as $skill)
                                    <span class="tags">{{ $skill->title }}</span> 
                                    @endforeach
                                    @endif
                                    <a href="{{ route('job-post.skills',$post->id) }}">Add Skills</a>
                                </p>
                                <br>
                               
                            </div>
                            <div class="profile-info">
                                <h4 class="heading">Job Description</h4>
                                {{ $post->description }}
                            </div>
                        </div>
                    </div>                 
                </div>
                <div class="col-md-4">
                      <div class="profile-left">
                        <form method="POST" action="{{ route('job-post.add-candidate',$post->id) }}">
                        {{csrf_field()}}
                        
                        @foreach ($candidate as $cskill)
                            {{-- expr --}}
                         @if(!$cskill->skills->isEmpty())
                        <div class="col-md-1 " >
                                 <input type="checkbox" style="margin-top: 100px;" {{ (in_array($cskill->id, $candidate_added)) ? 'checked' :'' }} name="candidate[]" value="{{ $cskill->id }}">
                             </div>

                                <div class="col-md-10">
                                    <div class="profile-header">
                                        <div class="overlay"></div>
                                        <div class="profile-main">
                                           <img src="{{ asset('image/Profile_avatar_placeholder_large.png') }}" style="width:70px;height:70px;" class="img-circle" alt="Avatar">
                                           <h3 class="name">{{ $cskill->first_name }}</h3>
                                           <span class="online-status status-available"><h5>{{ $cskill->title }}</h5></span>
                                       </div>
                                       <div class="profile-stat">
                                        <div class="row">
                                            <div class="col-md-4 stat-item">
                                                <span>Google,San Francisco ,USA</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                             @endif
                            @endforeach
                           
                            <button class="btn btn-success">Add Candidate</button>

                        </form>
                        </div> 
                </div>
            </div>
       

    </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
