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
                    <h5 class="mt-3">Social Media Share:</h5>
                    <hr class="mt-2 mb-3">
                    
                    <div class="social">
                        <div class="outlineSocialShare">
                            <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://naim.test/{{Request::path()}}"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="http://twitter.com/share?url=http://naim.test/{{Request::path()}}"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=http://naim.test/{{Request::path()}}"><i class="fa fa-linkedin"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
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
                                    <a class="latest-title" href="{{ route('single-blog', $item->slug) }}">{{ Str::limit($item->title, 40) }}</a>
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