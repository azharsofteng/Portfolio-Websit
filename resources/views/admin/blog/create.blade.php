@extends('layouts.admin-master')
@section('title','Blog Create')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i> &nbsp; Add New Blog Post</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('blog.index') }}">Blog list</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="tile">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="title">Blog Title <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Enter Blog Title">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row mt-2">
                    <label class="col-md-3" for="date">Blog Date <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input name="date" class="form-control @error('date') is-invalid @enderror" id="date" type="date" value="{{ date("Y-m-d") }}">
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
                <div class="form-group mt-2">
                    <label for="is_feature"><input type="checkbox" name="is_feature" id="is_feature" checked value="1"> <span class="ml-2">Is Feature</span></label>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="image">Blog Image </label>
                    <div class="col-md-9">
                        <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                        <div class="form-group mt-1">
                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                        </div>
                    </div>  
                </div> 
            </div>
            <div class="col-md-12">
                <label for="description">Blog Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Enter Blog Description"></textarea>
            </div>
        </div>
        <div class="tile-footer text-right">
            <button class="btn btn-primary " type="submit">Create</button>
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
    document.getElementById("previewImage").src="/default.png";
</script>
@endpush