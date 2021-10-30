@extends('layouts.website-master')
@section('title', 'Blog Details')
@section('user-content')
    <div class="single-blog" class="mb-5" style="margin-top: 60px;">
        <div class="single-blog-cover">
            <h4 class="text-white text-center"><a class="text-white" href="{{ route('home') }}">Home</a> / Blog Details</h4>
        </div>
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-9">
                    <br>
                    <h3 class="single-title mb-0">{{ $blog->title }}</h3>
                    <p><i class="fa fa-clock-o"></i> {{  \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y / h:i:s A')}}</p>
                    <img style="width:100%;" src="{{ asset($blog->image) }}" alt="">
                    <div class="mt-2">{!! $blog->description !!}</div>
                </div>
                <div class="col-md-3">
                    <div class="other-blog mt-5">
                        <h3 class="single-title">Latest Blog</h3>
                        @foreach ($latestBlog as $item)
                        <div class="latest-blog card mb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <img style="width:100%; min-height:90px;" src="{{ asset($item->image) }}" alt="">
                                </div>
                                <div class="col-md-6 p-0">
                                    <a class="latest-title" href="{{ route('single-blog', $item->slug) }}">{{ $item->title }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection