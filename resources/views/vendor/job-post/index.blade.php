@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">

                        <div class="container">
                            @foreach ($posts as $post)
                            <h3 class="card-title"> Job Title :{{$post->title}}</h3>
                            
                            <p class="card-text">Job Description :{{$post->description}}</p> 
                            <h5 class="card-title">Experience: {{$post->experience}} Year(s)</h3>

                            <h5 class="card-title">Salary:{{$post->salary}}/-</h3>

                             <a href="{{route('job-post.edit',$post->id)}}" class="card-link">Edit </a>

                            <a href="{{route('job-post.show',$post->id)}}" class="card-link">Show</a>
                            @endforeach
                        </div>
                       {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
