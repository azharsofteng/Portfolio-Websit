@extends('layouts.admin-master')
@section('title','Add Category')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-list-alt"></i> Add New Category</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="tile">
        <div class="row">
            <div class="col-lg-4 offset-md-4">
                <div class="form-group row">
                    <label  for="name">Category Name <span class="text-danger">*</span></label>
                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text"  placeholder="Enter Name" value="{{ old('name') }}">
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
<div class="row">
    <div class="col-md-12">
        <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered text-center" id="sampleTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $key=>$item)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{ route('category.edit',$item) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="deleteCategory({{ $item->id }})"><i class="fa fa-trash"></i></button>
                        <form id="delete-form-{{ $item->id }}" action="{{ route('category.destroy',$item) }}" method="POST" style="display: none;">
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
@push('admin-js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteCategory(id) {
        swal({
            title: 'Are you sure?',
            text: "You want to Delete this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
@endpush