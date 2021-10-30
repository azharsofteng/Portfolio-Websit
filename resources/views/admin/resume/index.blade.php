@extends('layouts.admin-master')
@section('title','Resume List')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i> &nbsp; All Resume List</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('resume.create') }}">Add New</a></li>
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
                        <th>Resume Type</th>
                        <th>Degree & Designation</th>
                        <th>Session & Year</th>
                        <th>Short Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resumes as $key=>$item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->degree_and_designation }}</td>
                        <td>{{ $item->session_and_year }}</td>
                        <td>{{ Str::limit($item->short_description, 50) }}</td>
                        <td>
                            <a href="{{ route('resume.edit',$item) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="deleteResume({{ $item->id }})"><i class="fa fa-trash"></i></button>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('resume.destroy',$item) }}" method="POST" style="display: none;">
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
    function deleteResume(id) {
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