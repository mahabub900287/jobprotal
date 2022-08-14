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
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center"
                data-background="{{ asset('') }}img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-9 col-md-10">
                            <div class="hero__caption">
                                <h1>Find the most exciting startup jobs</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-8">
                            <!-- form -->
                            <form action="{{ route('frontend.search') }}" method="get" class="search-box">
                                @csrf
                                <div class="input-form">
                                    <input type="text" name="jobpost" placeholder="Job Tittle or keyword">
                                </div>
                                <div class="select-form">
                                    <div class="select-itms">
                                        <select id="select1">
                                            <option value="All">All</option>
                                            @foreach ($datas as $data)
                                              <option value="{{ $data->id }}">{{ $data->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="search-form">
                                    <button class="btn-success h-100 w-100 border-0" type="submit">Find job</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- Our Services Start -->
    <div class="our-services section-pad-t30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Browse Top Categories </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-contnet-center">
                @foreach ($category as $value)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30 pe-2">
                            <div class="services-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="services-cap text-center">
                                <h5><a href="{{ route('frontend.category.single.index',$value->id) }}">{{ $value->name }}</a></h5>
                                @php
                                    $data = \App\Models\JobType::where('category', $value->id)->count();
                                @endphp
                                <span>({{ $data }})</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- More Btn -->
        </div>
    </div>
    <!-- Our Services End -->
    <!-- Featured_job_start -->
    <section class="featured-job-area feature-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Recent Job</span>
                        <h2>Featured Jobs</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <!-- single-job-content -->
                    @forelse ($datas as $data)
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
    </div>
</div>
<!-- slider Area End-->
<!-- Featured_job_end -->
 </section>
    <!-- Featured_job_end -->
@endsection
<!-- internal js -->
@push('scripts')
    <script></script>
@endpush
