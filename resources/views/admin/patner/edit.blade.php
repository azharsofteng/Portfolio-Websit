@extends('layouts.admin-master')
@section('title','Edit Partner')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i> &nbsp; Edit Partner</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('patner.index') }}">Partner list</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('patner.update', $patner)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tile">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="name">Partner Name<span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text"  placeholder="Partner Name" value="{{ $patner->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="image">Partner Logo <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" id="image" type="file" name="logo" onchange="readURL(this);">
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
    document.getElementById("previewImage").src="{{ asset($patner->logo) }}";
</script>
@endpush