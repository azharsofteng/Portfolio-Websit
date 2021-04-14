@extends('layouts.admin-master')
@section('title','Contact List')
@push('admin-css')
@endpush
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-user"></i> About Data Update</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('about.update',$about)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="tile">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="name"> Name</label>
                    <div class="col-md-9">
                        <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text"  placeholder="Enter Your Name" value="{{ $about->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="age">Your Age</label>
                    <div class="col-md-9">
                        <input name="age" class="form-control @error('age') is-invalid @enderror" id="age" type="text"  placeholder="Enter Your age" value="{{ $about->age }}">
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="phone">Phone</label>
                    <div class="col-md-9">
                        <input name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" type="text"  placeholder="about phone" value="{{ $about->phone }}">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="telephone">Telephone</label>
                    <div class="col-md-9">
                        <input name="telephone" class="form-control @error('telephone') is-invalid @enderror" id="telephone" type="text"  placeholder="about telephone" value="{{ $about->telephone }}">
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="email"> Email</label>
                    <div class="col-md-9">
                        <input name="email" class="form-control @error('email') is-invalid @enderror" id="email" type="text"  placeholder="about email" value="{{ $about->email }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="experience"> Experience</label>
                    <div class="col-md-9">
                        <input name="experience" class="form-control @error('experience') is-invalid @enderror" id="experience" type="text"  placeholder="experience" value="{{ $about->experience }}">
                        @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="country"> country</label>
                    <div class="col-md-9">
                        <input name="country" class="form-control @error('country') is-invalid @enderror" id="country" type="text"  placeholder="country" value="{{ $about->country }}">
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="location"> Location</label>
                    <div class="col-md-9">
                        <input name="location" class="form-control @error('location') is-invalid @enderror" id="location" type="text"  placeholder="Enter Your location" value="{{ $about->location }}">
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="designation"> Designation</label>
                    <div class="col-md-9">
                        <input name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" type="text"  placeholder="Enter Your designation" value="{{ $about->designation }}">
                        @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="cover_picture">Cover photo</label>
                    <div class="col-md-9">
                    <input class="form-control" id="cover_picture" type="file" name="cover_picture" >
                        {{-- <div class="form-group mt-2">
                            <img class="form-controlo img-thumbnail" src="#" id="previewCover" style="width: 100%;height: 150px; background: #3f4a49;">
                        </div> --}}
                    </div>  
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="freelance"> Freelance</label>
                    <div class="col-md-9">
                        <input name="freelance" class="form-control @error('freelance') is-invalid @enderror" id="freelance" type="text"  placeholder="Freelance Status" value="{{ $about->freelance }}">
                        @error('freelance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="cover_letter"> Cover letter</label>
                    <div class="col-md-9">
                        <textarea class="form-control @error('cover_letter') is-invalid @enderror" name="cover_letter" id="cover_letter" cols="3" rows="3" placeholder="Enter Cover letter">{{ $about->cover_letter }}</textarea>
                        @error('cover_letter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3" for="fb">Facebook</label>
                    <div class="col-md-9">
                        <input name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="fb" type="text"  placeholder="Your Facebook" value="{{ $about->facebook }}">
                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
                <div class="form-group row">
                    <label class="col-md-3" for="tw">Twitter</label>
                    <div class="col-md-9">
                        <input name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="tw" type="text"  placeholder="Your twitter" value="{{ $about->twitter }}">
                        @error('twitter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="li">Linkedin</label>
                    <div class="col-md-9">
                        <input name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" id="li" type="text"  placeholder="Your linkedin" value="{{ $about->linkedin }}">
                        @error('linkedin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                
                <div class="form-group row">
                    <label class="col-md-3" for="ins">Instagram</label>
                    <div class="col-md-9">
                        <input name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="ins" type="text"  placeholder="Your instagram" value="{{ $about->instagram }}">
                        @error('instagram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="resume">Resume Pdf</label>
                    <div class="col-md-9">
                        <input class="form-control" id="resume" type="file" name="resume">
                    </div>  
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="image">Your Image</label>
                    <div class="col-md-9">
                        <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                        <div class="form-group mt-2">
                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                        </div>
                    </div>  
                </div> 
            </div>
        </div>
        <div class="tile-footer">
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
    document.getElementById("previewImage").src="{{ asset($about->image) }}";
</script>
@endpush