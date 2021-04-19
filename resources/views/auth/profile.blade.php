@extends('layouts.admin-master')
@section('title','Update Profile')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-user"></i> &nbsp; Update Profile</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tile">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="category"> Name <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text"  placeholder="Enter Name" value="{{ Auth::user()->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="email"> Email <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" type="text"  placeholder="Enter email" value="{{ Auth::user()->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="fb">UsreName <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input name="user_name" class="form-control @error('user_name') is-invalid @enderror" id="fb" type="text"  placeholder="Portfolio user_name" value="{{ Auth::user()->user_name }}">
                        @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="image">Image </label>
                    <div class="col-md-9">
                        <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                        <div class="form-group mt-2">
                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                        </div>
                    </div>  
                </div> 
            </div>
        </div>
        <div class="tile-footer text-right">
            <button class="btn btn-primary " type="submit">Update</button>
        </div>
        </div>
        </form>
    </div>
</div>
@endsection
@push('admin-js')
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImage')
                .attr('src', e.target.result)
                .width(100)
                .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset(Auth::user()->image) }}";
</script>
@endpush