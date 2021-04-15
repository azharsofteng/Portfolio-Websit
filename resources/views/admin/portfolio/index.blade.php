@extends('layouts.admin-master')
@section('title','Portfolio List')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-user"></i> &nbsp; All Portfolio List</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('portfolio.create') }}">Portfolio Create</a></li>
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
                                <th>Category</th>
                                <th>Name</th>
                                <th>URl</th>
                                <th>Image</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $key=>$portfolio)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$portfolio->category->name}}</td>
                                <td>{{$portfolio->name}}</td>
                                <td>{{$portfolio->url}}</td>
                                <td>
                                    @if ($portfolio->image != '')
                                        <img style="height: 40px; width:50px;" src="{{ asset($portfolio->image) }}" alt="">
                                    @else    
                                        <img style="height: 40px; width:50px;" src="{{ asset('default.png') }}" alt="">
                                    @endif
                                </td>
                                <td>{{$portfolio->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ route('portfolio.edit',$portfolio) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="deleteCategory({{ $portfolio->id }})"><i class="fa fa-trash"></i></button>
                                    <form id="delete-form-{{ $portfolio->id }}" action="{{ route('portfolio.destroy',$portfolio) }}" method="POST" style="display: none;">
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