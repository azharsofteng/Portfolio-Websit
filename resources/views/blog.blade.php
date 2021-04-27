@extends('layouts.website-master')
@section('title', 'Home')
@section('user-content')
<section id="blog" class="mb-5" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="card">
                    <img style="height: 200px;" src="{{ asset('img/blog.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img style="height: 200px;" src="{{ asset('img/blog.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img style="height: 200px;" src="{{ asset('img/blog.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection