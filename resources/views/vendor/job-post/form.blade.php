@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ ($edit) ? 'Update Job' : 'Add Job'}}</div>
                <div class="panel-body">
                    <form method="POST" action="{{ ($edit) ? route('job-post.edit',$post->id) : route('job-post.store')}}">
                        {{csrf_field()}}
                        @if($edit)
                        {{csrf_method('PUT')}}
                        @endif
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Job Tile</label>
                            <input type="text" class="form-control" name="title" value="{{$post->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Job Description</label>
                            <textarea class="form-control" name="description" rows="3" required>{{$post->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Experience</label>
                            <select class="form-control" required name="experience">
                                @for($i = 0;$i<=5;$i++)
                                <option @if($post->experience == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="exampleFormControlSelect1">Location Hiring for</label>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <select  class="form-control" name="country">
                                    @for($i = 1;$i<=5;$i++)
                                    <option @if($post->country_id == $i) selected @endif value="{{$i}}">Country{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select  class="form-control" name="state">
                                     @for($i = 1;$i<=5;$i++)
                                    <option @if($post->state_id == $i) selected @endif value="{{$i}}">State{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select  class="form-control" name="city">
                                     @for($i = 1;$i<=5;$i++)
                                    <option @if($post->city== $i) selected @endif value="{{$i}}">City{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Salary</label>
                            <input type="text" class="form-control " name="salary"value="{{$post->salary}}" required>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                        <button class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
