@extends('layouts.frontend')
<!-- title -->
@section('title', $title)
<!-- meta title-->
@section('meta_title', $metaTitle)
<!-- meta desciption-->
@section('meta_description', $metaDesc)
<!-- internal css -->
@push('styles')
    <style>
        .user-profile {
            background: #a2b0a6 !important;
        }

        .profile {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #a2b0a6;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5rem !important;
        }
    </style>
@endpush

@section('main-content')
    <div class="container py-5 bg-light mb-4">
        <div class="row user-profile">
            <div class="col-lg-4">
                <div class="card profile">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset(Auth::user()->avatar)}}" alt="Admin"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{ Auth::user()->fname }}{{ Auth::user()->lname }}</h4>
                                <a class="btn btn-outline-primary" href="{{ route('frontend.apply-job.index') }}">Your Apply List</a>
                            </div>
                        </div>

                    <hr class="my-4">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                                </svg>Company Name
                            </h6>
                            <span class="text-secondary">{{ Auth()->user()->company_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                                </svg>Company Website
                            </h6>
                            <span class="text-secondary">{{ Auth()->user()->company_website }}</span>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                </path>
                                </svg>Facebook
                            </h6>
                            <span class="text-secondary">bootdey</span>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between p-4">
                        <h3 class="">Post Your Job List</h3>
                        <div>
                            <a class="text-dark" href="{{ route('frontend.job-post.index') }}">Create a New Job</a>
                        </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Selary Rang</th>
                                    <th>Job Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $data)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $data->category }}</td>
                                        <td>{{ $data->selary_rang }}</td>
                                        <td>{{ $data->job_type }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a class="text-info px-2"
                                                href="{{ route('frontend.job-post.edit', $data->id) }}"><i
                                                    class="far fa-edit"></i></a>
                                            <form action="{{ route('frontend.job-post.destroy', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 text-danger bg-white"><i
                                                        class="fas fa-trash-alt"></i></button>
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
    </div>

    <!-- Featured_job_end -->
@endsection
<!-- internal js -->
@push('scripts')
    <script></script>
@endpush
