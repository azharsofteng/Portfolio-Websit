@extends('layouts.website-master')
@section('title', 'Blog')
@section('user-content')
<section id="blog" class="mb-5" style="margin-top: 60px;">
    <div class="blog-cover">
        <h4 class="text-white text-center"><a class="text-white" href="{{ route('home') }}">Home</a> / Blog</h4>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 mt-4">
                <div class="card blog-card">
                    <img style="height: 200px;" src="{{ asset($blog->image) }}" class="card-img-top" alt="...">
                    <div class="card-body blog-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <div>
                            {!! Str::limit($blog->description, 120, '...') !!}
                        </div>
                        <a href="{{ route('single-blog', $blog->slug) }}" class="btn btn-info btn-sm mt-2">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection