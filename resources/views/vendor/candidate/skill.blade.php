@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/fastselect.min.css') }}">
@endpush
<style type="text/css"></style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Skills</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('candidate-info.add-skills',$candidate->id) }}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <select class="multipleSelect form-control" multiple name="skills[]">
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}" {{ (in_array($skill->id, $skills_added)) ? 'selected' : '' }}>{{ $skill->title }}</option>
                                @endforeach
                            </select>
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
@push('script')
<script type="text/javascript" src="{{ asset('js/fastselect.min.js') }}"></script>
<script type="text/javascript">
    $('.demo').fastselect();
</script>
@endpush
