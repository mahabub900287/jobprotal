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
<div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-tittle text-center">
                <h2>Browse  Categories {{ $category->name }} </h2>
            </div>
        </div>
        @foreach ($datas as  $data)
        <a href="{{ route('frontend.single.index',$data->id) }}" class="text-dark">
            <div class="col-md-3">
                <div class="card text-center bg-light">
                    <img src="{{ asset($data->image) }}" class="img-fluid p-4" alt="" style="height: 150px;width:100%">
                    <div class="card-body text-center">
                        <h4>{{ $data->jobCategorys->name }}</h4>
                        <div class="text-strat d-flex justify-content-between border-bottom">
                            <div class="company-neme">
                                <p>{{ $data->company_name }}</p>
                            </div>
                            <span>{{ $data->job_type }}</span>
                        </div>
                        <div class="description text-start">
                            <p>{{ Str::limit($data->description, 100, '...') }} <a href="" class="text-info">Details Job</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach

    </div>
</div>
<!-- Featured_job_end -->
@endsection
<!-- internal js -->
@push('scripts')
    <script></script>
@endpush
