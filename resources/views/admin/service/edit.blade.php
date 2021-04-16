@extends('layouts.admin-master')
@section('title','Edit Service')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i> &nbsp; Edit Service</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('service.index') }}">service list</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('service.update', $service)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tile">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="name">Service Name<span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text"  placeholder="service Name" value="{{ $service->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="short_description">Short Description</label>
                    <div class="col-md-9">
                        <textarea name="short_description" id="short_description" cols="5" rows="5" class="form-control" placeholder="Enter Short Description">{{ $service->short_description }}</textarea>
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="image">Service Icon <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" id="image" type="file" name="icon" onchange="readURL(this);">
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
    document.getElementById("previewImage").src="{{ asset($service->icon) }}";
</script>
@endpush