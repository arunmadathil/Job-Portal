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
                <div class="panel-heading"><h4>Candidate Details</h4> <a href="{{ route('candidate-info.create') }}" class="btn btn-primary">Add</a></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($candidates as $candidate)
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
                                        <h2>{{ $candidate->first_name." ".$candidate->middle_name." ".$candidate->last_name  }}</h2>
                                        <p><strong>About: </strong> {{ $candidate->title }} </p>

                                        <p><strong>Skills: </strong>
                                            @if(!$candidate->skills->isEmpty())
                                        @foreach ($candidate->skills as $skill)
                                        <span class="tags">{{ $skill->title }}</span> 
                                        @endforeach
                                        @endif
                                        </p>
                                        <p>
                                            <a href="{{ route('candidate-info.edit',$candidate->id) }}" class=""><i class="fa fa-pencil" style="font-size:20px"></i> Edit</a>
                                            <a href="{{ route('candidate-info.show',$candidate->id) }}"> View</a>
                                        </p>
                                    </div>             

                                </div>            

                            </div> 
                            @endforeach                
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
