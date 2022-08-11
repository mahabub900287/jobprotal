@extends('layouts.frontend')
<!-- title -->
@section('title', $title)
<!-- meta title-->
@section('meta_title', $metaTitle)
<!-- meta desciption-->
@section('meta_description', $metaDesc)
<!-- internal css -->
@push('styles')
@endpush

@section('main-content')
<div class="container mt-5">
    <div class="row">
        <div class="col-10 mx-auto">
            @forelse ($posts as $data)
            <div class="single-job-items mb-30">
                <div class="job-items">
                    <div class="company-img">
                        <a href="{{ route('frontend.single.index', $data->id) }}"><img src="{{ asset($data->image) }}" alt=""
                                style="height: 50px;width:100px"></a>
                    </div>
                    <div class="job-tittle">
                        <a href="{{ route('frontend.single.index', $data->id) }}">
                            <h4>{{ $data->category }}</h4>
                        </a>
                        <ul>
                            <li>{{ $data->company_name }}</li>
                            <li><i class="fas fa-map-marker-alt"></i>{{ $data->address }}</li>
                            <li>{{ $data->selary_rang }}</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link f-right">
                    <a href="">{{ $data->job_type }}</a>
                    <span>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>

@endsection
<!-- internal js -->
@push('scripts')
    <script></script>
@endpush
