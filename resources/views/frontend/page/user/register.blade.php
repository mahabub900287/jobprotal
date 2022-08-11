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
<style>
    .login {
        background-image: url('{{ asset('img/bg.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height: 600px;
    }
</style>
@section('main-content')
    <div class="login mt-0">
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="row">
            <div class="col-6 mx-auto py-4">
                <div class="login_wrapper mt-0">
                    <div class="animate form login_form" style="margin-top:50px;background:rgba(0,0,0,0.5);padding:20px">
                        <section class="login_content text-center pt-4">
                            <img src="{{ asset('img/image.jpeg') }}" class="rounded-circle" width="100" alt="">
                            <form method="POST" action="{{ route('frontend.registration.store') }}">
                                @csrf
                                <h1 class="text-white mb-5 mt-3">Create Account</h1>
                                <div class="row">
                                    <div class="col-6">
                                        <input id="fname" type="text" placeholder="First Name" class="form-control shadow-none mb-3 p-4"
                                            name="fname" value="{{ old('fname') }}">
                                            @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input id="lname" type="text" placeholder="Last Name" class="form-control shadow-none mb-3 p-4 @error('lname') is-invalid @enderror"
                                            name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input id="email" type="email" placeholder="Email" class="form-control p-4 shadow-none mb-3 @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input id="phone" type="phone" placeholder="Phone Number" class="form-control p-4 shadow-none mb-3 @error('email') is-invalid @enderror"
                                            name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <input id="password" type="password" placeholder="Password"
                                            class="form-control p-4 shadow-none mb-3 @error('password') is-invalid @enderror" name="password" required
                                            autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control shadow-none mb-3 p-4"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input id="company_name" type="text" placeholder="Company Name"
                                            class="form-control p-4 shadow-none mb-3 @error('company_name') is-invalid @enderror" name="company_name" required
                                            autocomplete="new-password">

                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <input id="company_website" placeholder="Company Website" type="text" class="form-control shadow-none mb-3 p-4"
                                            name="company_website" required autocomplete="new-password">

                                            @error('company_website')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                        <button class="btn btn-success btn-block shadow-none mb-3" type="submit">Submit
                                        </button>
                                    <div>
                                        <a class="reset_pass" href="{{ route('login') }}">All Ready Have a Accound</a>
                                    </div>

                                    <div class="clearfix"></div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Featured_job_end -->
@endsection
<!-- internal js -->
@push('scripts')
<script>
</script>
@endpush
