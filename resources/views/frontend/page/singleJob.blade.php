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
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center"
            data-background="{{ asset('') }}img/hero/about.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ $single_job->category }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="assets/img/icon/job-list1.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>{{ $single_job->category }}</h4>
                                </a>
                                <ul>
                                    <li>{{ $single_job->company_name }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $single_job->address }}</li>
                                    <li>{{ $single_job->selary_rang }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Description</h4>
                            </div>
                            <p>{{ $single_job->description }}</p>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Required Knowledge, Skills, and Abilities</h4>
                            </div>
                            <ul>
                                <li>System Software Development</li>
                                <li>Mobile Applicationin iOS/Android/Tizen or other platform</li>
                                <li>Research and code , libraries, APIs and frameworks</li>
                                <li>Strong knowledge on software development life cycle</li>
                                <li>Strong problem solving and debugging skills</li>
                            </ul>
                        </div>
                        <div class="post-details2  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Education + Experience</h4>
                            </div>
                            <ul>
                                <li>3 or more years of professional design experience</li>
                                <li>Direct response email experience</li>
                                <li>Ecommerce website design experience</li>
                                <li>Familiarity with mobile and web apps preferred</li>
                                <li>Experience using Invision a plus</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Job Overview</h4>
                        </div>
                        <ul>
                            <li>Posted date :
                                <span>{{ \Carbon\Carbon::parse($single_job->created_at)->diffForHumans() }}</span>
                            </li>
                            <li>Location : <span>{{ $single_job->address }}</span></li>
                            <li>Job nature : <span>{{ $single_job->job_type }}</span></li>
                            <li>Salary : <span>{{ $single_job->selary_rang }}</span></li>
                            <li>Application date : <span>12 Sep 2020</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="{{ route('frontend.apply.index', $single_job->id) }}" class="btn">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
@endsection
<!-- internal js -->
@push('scripts')
    <script></script>
@endpush
