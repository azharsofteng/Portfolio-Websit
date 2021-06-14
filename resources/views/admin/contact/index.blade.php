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
                    {{-- <th>Message</th> --}}
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
                    {{-- <td>{{ Str::limit($item->message, 50) }}</td> --}}
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>
                        <button class="show-contact btn btn-dark btn-sm" data-contact-id="{{ $item->id }}">
                            <i class="fa fa-eye"></i> <i class="fa fa-spin fa-spinner" style="display:none"></i>
                        </button>
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
<div class="modal fade" id="contactView" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Full Contact View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>Name: </strong> <span id="contact-name"></span> <br>
                <strong>Email: </strong> <span id="contact-email"></span> <br>
                <strong>Subject: </strong> <span id="contact-subject"></span> <br>
                <strong>Phone: </strong> <span id="contact-phone"></span> <br>
                <strong>Message: </strong> <span id="contact-message"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('admin-js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteContact(id) {
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

    $(document).on('click', '.show-contact', function (e) {
        e.preventDefault();
        $(this).prop('disabled', true).find('.fa-eye').hide();
        $(this).find('.fa-spin').show();
        let contact_id = $(this).data('contact-id');
        if (contact_id) {
            let contact_url = "{{ url('/get_contact') }}/" + contact_id;
            $.ajax({
                url: contact_url,
                method: 'GET',
                success: function (res) {
                    if (res) {
                        $("#contact-name").text(res.name);
                        $("#contact-email").text(res.email);
                        $("#contact-subject").text(res.subject);
                        $("#contact-phone").text(res.phone);
                        $("#contact-message").text(res.message);
                        $("#contactView").modal('show');
                        $(this).find('.fa-spin').hide();
                        $(this).prop('disabled', false).find('.fa-eye').show();
                    } else {
                        alert('No data available');
                        $(this).prop('disabled', false).find('.fa-eye').show();
                    }
                }.bind(this),
                error: function (e) {
                    alert(`${e.status}, ${e.statusText}`);
                }
            })
        }
    })
</script>
@endpush