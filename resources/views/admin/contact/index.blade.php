@extends('layouts.admin-master')
@section('title','Contact List')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th-list"></i> All Contact List</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="{{route('dashboard')}}">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $key=>$item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ Str::limit($item->message, 50) }}</td>
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="deleteSubscribe({{ $item->id }})"><i class="fa fa-trash"></i></button>
                        <form id="delete-form-{{$item->id}}" action="" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection