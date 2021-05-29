@extends('layouts.website-master')
@section('title', 'Blog Details')
@section('user-content')
    <div class="container mt-5">
        <br>
        <h1 class="mt-5">{{ $blog->title }}</h1>
        <div>{{ $blog->description }}</div>
    </div>
@endsection