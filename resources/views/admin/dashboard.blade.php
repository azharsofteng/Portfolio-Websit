@extends('layouts.admin-master')
@section('title','Home')
@push('admin-css')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
@endpush
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
        <a href="{{ route('service.index') }}">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-briefcase fa-3x"></i>
                <div class="info">
                    <h4>Services</h4>
                    <p><b>{{ $services }}</b></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="{{ route('contact.index') }}">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-envelope fa-3x"></i>
                <div class="info">
                    <h4>Contact</h4>
                    <p><b>{{ $contact }}</b></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="{{ route('portfolio.index') }}">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Projects</h4>
                    <p><b>{{ $portfolio }}</b></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-lg-3">
        <a href="{{ route('logout') }}">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-power-off fa-3x"></i>
                <div class="info">
                    <h4>Logout</h4>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection