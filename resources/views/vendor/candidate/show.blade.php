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
                <div class="panel-heading"><h4>Candidate Details</h4></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                           <div class="well profile">
                            <div class="col-sm-12">
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <div class="overlay"></div>
                                    <div class="">
                                        <img src="{{ asset('image/Profile_avatar_placeholder_large.png') }}" style="width:150px;height:150px;" class="img-circle" alt="Avatar"> 
                                        <h3 class="name"></h3>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <h2>Nicole Pearson</h2>
                                    <p><strong>About: </strong> Web Designer / UI. </p>
                                    <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
                                    <p><strong>Skills: </strong>
                                        @if(!$candidate->skills->isEmpty())
                                        @foreach ($candidate->skills as $skill)
                                        <span class="tags">{{ $skill->title }}</span> 
                                        @endforeach
                                        @endif
                                        <a href="{{ route('candidate-info.skills',$candidate->id) }}">Add Skills</a>
                                    </p>
                                </div>             

                            </div>            

                        </div>                 
                    </div>
                </div>
                <div class="" >
                    <div class="col-md-4">
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            
                            <div class="overlay"></div>
                            <div class="profile-main">

                               <h3 class="name">Contact</h3>

                               <div class="stat-item">
                                <span class="online-status status-available"><i class="fa fa-home" style="font-size:20px"></i> Available</span>
                                <br>
                                <span><i class="fa fa-phone-square" style="font-size:20px"></i> Projects</span> 
                                <br>
                                <span><i class="fas fa-envelope" style="font-size:20px"></i></i> Projects</span> 
                            </div>


                        </div>


                    </div>
                </div>
                <div class="col-md-8">
                   <div class="profile-left">
                     <div class="overlay"></div>
                     <div class="profile-detail">
                        
                        <div class="profile-info">
                            <h4 class="heading">Job Description</h4>
                            <hr>
                            {{ $candidate->cv_data }}
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
</div>
</div>
@endsection
