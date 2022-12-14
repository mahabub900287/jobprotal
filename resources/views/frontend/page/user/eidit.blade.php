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
    <div class="container p-5 bg-light mb-4">
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
                        <h3 class="p-4 text-center">Post Your Job</h3>
                        <form action="{{ route('frontend.job-post.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $datas->id}}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Category</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select name="category" class="selectpicker w-100" id="">
                                        @forelse ($categorys as $category)
                                            <option value="{{ $category->name }}" @isset($datas) {{ $category->name == $datas->category ? 'selected' : '' }} @endisset>{{ $category->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category')
                                        <p class="alert alert-danger p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="company_name"
                                        value="{{ $datas->company_name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="address" value="{{ $datas->address }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Selary Rang</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="selectpicker w-100" name="selary_rang">
                                        <option value="$10000-$15000"
                                            @isset($datas) {{ $datas->selary_rang == "$10000-$15000" ? 'selected' : '' }} @endisset>
                                            $10000-$15000 TK</option>
                                        <option value="$15000-$20000"
                                            @isset($datas) {{ $datas->selary_rang == "$15000-$20000" ? 'selected' : '' }} @endisset>
                                            $15000-$20000 TK</option>
                                        <option value="$20000-$25000"
                                            @isset($datas) {{ $datas->selary_rang == "$20000-$25000" ? 'selected' : '' }} @endisset>
                                            $20000-$25000 TK</option>
                                        <option class="$25000-$30000"
                                            @isset($datas) {{ $datas->selary_rang == "$25000-$30000" ? 'selected' : '' }} @endisset>
                                            $25000-$30000 TK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job Type</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="selectpicker w-100" name="job_type">
                                        <option value="Full Time"
                                        @isset($datas) {{ $datas->job_type == "Full Time" ? 'selected' : '' }} @endisset>Full Time</option>
                                        <option value="Part Time"
                                        @isset($datas) {{ $datas->job_type == "Part Time" ? 'selected' : '' }} @endisset>Part Time</option>
                                        <option value="Intership"
                                        @isset($datas) {{ $datas->job_type == "Intership" ? 'selected' : '' }} @endisset>Intership</option>
                                        <option class="Project Based"
                                        @isset($datas) {{ $datas->job_type == "Project Based" ? 'selected' : '' }} @endisset>Project Based</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Image</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="file" class="form-control" name="image" value="{{ $datas->image }}">
                                    @error('image')
                                        <p class="alert alert-danger p-2 mt-3">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Description</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea id="" class="form-control" name="description" rows="6">{{ $datas->description }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                </div>
                            </div>
                        </form>
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
