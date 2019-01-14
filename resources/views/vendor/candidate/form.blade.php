@extends('layouts.app')
@push('css')

@endpush
<style type="text/css"></style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ ($edit) ? 'Update Job' : 'Add Job'}}</div>
                <div class="panel-body">
                    <form method="POST" action="{{ ($edit) ? route('candidate-info.edit',$candidate->id) : route('candidate-info.store')}}">
                        {{csrf_field()}}
                        @if($edit)
                        {{csrf_method('PUT')}}
                        @endif
                        <div class="form-group col-md-4" style="padding-left:0px;padding-right: 5px">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{$candidate->first_name}}" required>
                        </div>
                        <div class="form-group col-md-4" style="padding-left:0px;padding-right: 5px">
                            <label for="exampleFormControlInput1">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="{{$candidate->middle_name}}" required>
                        </div>
                        <div class="form-group col-md-4" style="padding-left:0px;padding-right: 0px">
                            <label for="exampleFormControlInput1">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{$candidate->last_name}}" required>
                        </div>
                         <div class="form-group " style="padding-left:0px;padding-right: 0px">
                            <label for="exampleFormControlInput1">Tile</label>
                            <input type="text" class="form-control" name="title" value="{{$candidate->title}}" required>
                        </div>
                        <div class="form-group col-md-4" style="padding-left:0px;padding-right: 5px">
                            <label for="exampleFormControlInput1">Gender</label>
                            <select  class="form-control" name="gender">
                                <option value="0">Men</option>
                                <option value="1">Women</option>
                                <option value="2">Others</option>
                            </select>
                        </div>  
                        <div class="form-group col-md-4" style="padding-left:0px;padding-right: 0px">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
                        </div>
                        <label>Total Work Experience</label>
                        <div class="col-md-4" style="padding-left:5px;padding-right: 0px">

                            <div class="form-group col-md-6" style="padding-left:0px;padding-right: 5px"> 
                                <select  class="form-control" name="gender">
                                    @for($i = 0;$i<=10;$i++)
                                    <option @if($candidate->years == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select></div>
                                <div class="form-group col-md-6" style="padding-left:0px;padding-right: 0px"> 
                                 <select  class="form-control" name="gender">
                                   @for($i = 1;$i<=11;$i++)
                                   <option @if($candidate->month == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                   @endfor
                               </select></div>

                           </div>
                        <div class="form-group col-md-4" style="padding-left:0px;padding-right: 5px">
                            <label for="exampleFormControlInput1">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{$candidate->mobile}}" required>
                        </div>
                        <div class="form-group col-md-4" style="padding-left:0px;padding-right: 5px">
                            <label for="exampleFormControlInput1">Telephone</label>
                            <input type="text" class="form-control" name="home" value="{{$candidate->home}}" required>
                        </div>
                             <div class="form-group col-md-4" style="padding-left:0px;padding-right: 5px">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$candidate->email}}" required>
                        </div>
                        <div class="form-group" style="padding-left:0px;padding-right: 0px">
                            <label for="exampleFormControlTextarea1">Summary</label>
                            <textarea class="form-control" name="cv_data" rows="3" required>{{$candidate->cv_data}}</textarea>
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
