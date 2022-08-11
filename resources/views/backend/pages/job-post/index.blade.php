@extends('layouts.backend')
<!-- title -->
@section('title',$title)
<!-- internal css -->
@push('styles')

@endpush

@section('main-content')
<div class="app-main__inner">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-body px-0">
                    <table class="align-middle mb-0 table table-hover" id="data-tables">
                        <thead>
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
                                <td class="text-muted">{{ $loop->index+1 }}</td>
                                <td>
                                    <img src="{{ asset($value->image) }}" width="50" alt="">
                                </td>
                                <td class="text-muted">{{ $value->company_name }}</td>
                                <td class="text-muted">{{ $value->category }}</td>
                                <td class="text-muted">{{ $value->selary_rang }}</td>
                                <td class="text-muted">
                                    @if ($value->status == 1)
                                    <span class="badge fs-6 fw-normal bg-success text-light font-weight-normal">Publish</span>
                                    @else
                                    <span class="badge fs-6 fw-normal bg-danger text-light font-weight-normal">Pending</span>
                                    @endif
                                </td>

                                <td class="text-muted">{{ date('Y-m-d', strtotime($value->created_at)) }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.job-post.edit', $value->id) }}" class="rounded-circle btn-style-edit" title="User Edit "><i
                                            class="far fa-edit fa-sm"></i></a>

                                    <button type="button" onclick="delete_data({{ $value->id }})" title="User Delete"
                                        class="border-0 rounded-circle btn-style-danger ml-2"><i
                                            class="far fa-trash-alt fa-sm"></i></button>

                                    <form id="delete-form-{{ $value->id }}" action="{{ route('admin.job-post.destroy', $value->id) }}" method="POST">
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

@endpush
