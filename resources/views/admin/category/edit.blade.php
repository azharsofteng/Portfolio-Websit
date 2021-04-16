@extends('layouts.admin-master')
@section('title','Edit Category')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-list-alt"></i> Edit Category</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('category.index') }}">Category List</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('category.update', $category)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tile">
        <div class="row">
            <div class="col-lg-4 offset-md-4">
                <div class="form-group row">
                    <label  for="name">Category Name <span class="text-danger">*</span></label>
                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text"  placeholder="Enter Name" value="{{ $category->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
            </div>
        </div>
        <div class="tile-footer text-center">
            <button class="btn btn-primary " type="submit">Create</button>
        </div>
        </div>
        </form>
    </div>
</div>
@endsection
