@extends('layouts.admin-master')
@section('title','Resume Edit')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i> &nbsp; Edit Resume</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('resume.index') }}">Resume list</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('resume.update', $resume)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tile">
        <div class="row">
            <div class="col-lg-6 offset-md-3">
                <div class="form-group row">
                    <label for="type">Resume Type<span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                        <option value="">----- Select One -----</option>
                        <option value="education" {{ $resume->type == 'education' ? 'selected' : '' }}>Education</option>
                        <option value="experience" {{ $resume->type == 'experience' ? 'selected' : '' }}>Experience</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                <div class="form-group row">
                    <label for="degree">Degree & Designation <span class="text-danger">*</span></label>
                    <input type="text" id="degree" class="form-control @error('degree_and_designation') is-invalid @enderror" name="degree_and_designation" placeholder="Degree & Designation" value="{{ $resume->degree_and_designation }}">
                    @error('degree_and_designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
                <div class="form-group row">
                    <label for="session">Session & Year <span class="text-danger">*</span></label>
                    <input type="text" id="session" class="form-control @error('session_and_year') is-invalid @enderror" name="session_and_year" placeholder="2015-2016 / jan2020-present" value="{{ $resume->session_and_year }}">
                    @error('session_and_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
                <div class="form-group row">
                    <label for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" cols="5" rows="5" class="form-control" placeholder="Enter Short Description">{{ $resume->short_description }}</textarea>
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
            </div>
        </div>
        <div class="tile-footer text-center">
            <button class="btn btn-primary " type="submit">Update</button>
        </div>
        </div>
        </form>
    </div>
</div>
@endsection
