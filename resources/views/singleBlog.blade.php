@extends('layouts.website-master')
@section('title', 'Blog Details')
@section('user-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-9">
                <br>
                <h1>{{ $blog->title }}</h1>
                <img style="width:100%;" src="{{ asset($blog->image) }}" alt="">
                <div>{{ $blog->description }}</div>
            </div>
            <div class="col-md-3">
                <div class="other-blog mt-5">
                    <h3>Latest Blog</h3>
                </div>
            </div>
        </div>
    </div>
@endsection