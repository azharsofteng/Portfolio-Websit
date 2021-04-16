@extends('layouts.admin-master')
@section('title','Service Create')
@section('admin_content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i> &nbsp; Add New Service</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a class="btn btn-info btn-sm" href="{{ route('dashboard') }}">Dashboard</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="{{route('service.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="tile">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="name">Service Name<span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text"  placeholder="service Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group row">
                    <label class="col-md-3" for="short_description">Short Description</label>
                    <div class="col-md-9">
                        <textarea name="short_description" id="short_description" cols="5" rows="5" class="form-control" placeholder="Enter Short Description"></textarea>
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
            </div>
            <div class="col-lg-6">
                <div class="form-group row">
                    <label class="col-md-3" for="image">Service Icon <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input class="form-control" id="image" type="file" name="icon" onchange="readURL(this);">
                        <div class="form-group mt-2">
                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                        </div>
                    </div>  
                </div> 
            </div>
        </div>
        <div class="tile-footer text-right">
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
                    <th>Name</th>
                    <th>Short Details</th>
                    <th>Created at</th>
                    <th>Icon</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($services as $key=>$item)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->short_description}}</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td>
                        <img style="height: 40px; width:40px;" src="{{ asset($item->icon) }}" alt="">
                    </td>
                    <td>
                        <a href="{{ route('service.edit',$item) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="deleteServic({{ $item->id }})"><i class="fa fa-trash"></i></button>
                        <form id="delete-form-{{ $item->id }}" action="{{ route('service.destroy',$item) }}" method="POST" style="display: none;">
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
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImage')
                .attr('src', e.target.result)
                .width(100)
                .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/default.png";
</script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteServic(id) {
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