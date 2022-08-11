@extends('layouts.backend')
<!-- title -->
@section('title', $title)
<!-- internal css -->
@push('styles')
    <style>
        .bg-transparent i:hover {
            background-color: black;
            color: #ffffff;
            padding: 4px;
            transition: .2s;
            border-radius: 50%;
        }
    </style>
@endpush

@section('main-content')
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12 mb-sm-0 mb-3">
                <div class="card">
                    <div class="card-header custom-card-header">
                        <h4 class="card-title d-flex justify-content-between align-items-center">{{ $title }}
                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target=".bd-example-modal-lg"> <i class="fa fa-plus fa-sm"></i> Create</a>
                        </h4>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="studentModal" tabindex="-1" role="dialog"
                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content p-4">
                                    <div class="card">
                                        <div class="card-header bg-secondary">
                                            <h3 class="mb-0">Student From</h3>
                                        </div>
                                        <div class="card-body">
                                            <form id="postForm" class="form-horizontal">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title" class="col-sm-2 control-label">Name</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Enter Name" value="">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-12">
                                                        <input id="email" name="email" placeholder="Enter Email"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Phone</label>
                                                    <div class="col-sm-12">
                                                        <input id="phone" name="phone"
                                                            placeholder="Enter Phone Number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Roll Number</label>
                                                    <div class="col-sm-12">
                                                        <input id="roll" name="roll" placeholder="Enter Roll "
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Registration Number</label>
                                                    <div class="col-sm-12">
                                                        <input id="registetion" name="registetion" placeholder="Enter Email"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" value="create">Save Post
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="align-middle mb-0 table table-hover" id="data-tables">
                            <thead id="studentId">
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Company Name</th>
                                    <th>Category</th>
                                    <th>Selary Range</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getData as $value)
                                    <tr>
                                        <td class="text-muted">{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($value->image) }}" width="50" alt="">
                                        </td>
                                        <td class="text-muted">{{ $value->company_name }}</td>
                                        <td class="text-muted">{{ $value->category }}</td>
                                        <td class="text-muted">{{ $value->selary_rang }}</td>
                                        <td class="text-muted">
                                            @if ($value->status == 1)
                                                <span
                                                    class="badge fs-6 fw-normal bg-success text-light font-weight-normal">Publish</span>
                                            @else
                                                <span
                                                    class="badge fs-6 fw-normal bg-danger text-light font-weight-normal">Pending</span>
                                            @endif
                                        </td>

                                        <td class="text-muted">{{ date('Y-m-d', strtotime($value->created_at)) }}</td>
                                        <td class="d-flex">
                                            <a href="" class="rounded-circle btn-style-edit" title="User Edit "><i
                                                    class="far fa-edit fa-sm"></i></a>

                                            <button type="button" onclick="delete_data({{ $value->id }})"
                                                title="User Delete" class="border-0 rounded-circle btn-style-danger ml-2"><i
                                                    class="far fa-trash-alt fa-sm"></i></button>

                                            <form id="delete-form-{{ $value->id }}" action="" method="POST">
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
<!-- internal js -->
@push('scripts')
    <script>
        $(document).submit(function(e) {
            e.preventDefault();
            let name = $("#name").val();
            let phone = $("#phone").val();
            let email = $("#email").val();
            let roll = $("#roll").val();
            let registetion = $("#registetion").val();
            let _token = $("#input[name=_token]").val();


            $.ajax({
                url: {{ route('admin.student.store') }},
                type: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    roll: roll,
                    registetion: registetion
                },
                success: function(response) {
                    if (response) {
                        $("#")
                    }
                }
            })
        })
    </script>
@endpush
