<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job board HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.min.css">
            <link rel="stylesheet" href="{{ asset('') }}css/owl.carousel.min.css">
            <link rel="stylesheet" href="{{ asset('') }}css/flaticon.css">
            <link rel="stylesheet" href="{{ asset('') }}css/price_rangs.css">
            <link rel="stylesheet" href="{{ asset('') }}css/slicknav.css">
            <link rel="stylesheet" href="{{ asset('') }}css/animate.min.css">
            <link rel="stylesheet" href="{{ asset('') }}css/magnific-popup.css">
            <link rel="stylesheet" href="{{ asset('') }}css/fontawesome-all.min.css">
            <link rel="stylesheet" href="{{ asset('') }}css/themify-icons.css">
            <link rel="stylesheet" href="{{ asset('') }}css/slick.css">
            <link rel="stylesheet" href="{{ asset('') }}css/nice-select.css">
            <link rel="stylesheet" href="{{ asset('') }}css/style.css">
   </head>
  <style>
    .login{
        background-image:url('{{asset('img/bg.jpg')}}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position:center;
        height:500px;
    }
  </style>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="row">
        <div class="col-4 mx-auto py-4">
            <div class="login_wrapper mt-0">
                <div class="animate form login_form" style="margin-top:90px;background:rgba(0,0,0,0.5);padding:20px">
                <section class="login_content text-center">
                    <img src="{{ asset('img/image.jpeg')}}" class="rounded-circle" width="100" alt="">
                    <form method="POST" action="{{ route('login') }}" class="py-5">
                        @csrf
                    <h1>Login Form</h1>
                    <div>
                        <input id="email" type="email" placeholder="User" class="form-control shadow-none mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <div>
                            <input id="password" placeholder="password" type="password" class="form-control shadow-none mb-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    <div>
                        <button class="btn btn-success btn-block mb-3 shadow-none" type="submit" href="{{ route('login')}}">Log in</button>
                    <div class="d-flex justify-content-between px-3">
                        <div class="create">
                            <a class="reset_pass" href="{{ route('register') }}">Create Accound</a>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="btn-link text-" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="clearfix"></div>
                    </form>
                </section>
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- All JS Custom Plugins Link Here here -->
<script src="{{ asset('') }}js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('') }}js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{ asset('') }}js/popper.min.js"></script>
<script src="{{ asset('') }}js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('') }}js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('') }}js/owl.carousel.min.js"></script>
<script src="{{ asset('') }}js/slick.min.js"></script>
<script src="{{ asset('') }}js/price_rangs.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('') }}js/wow.min.js"></script>
<script src="{{ asset('') }}js/animated.headline.js"></script>
<script src="{{ asset('') }}js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="{{ asset('') }}js/jquery.scrollUp.min.js"></script>
<script src="{{ asset('') }}js/jquery.nice-select.min.js"></script>
<script src="{{ asset('') }}js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="{{ asset('') }}js/contact.js"></script>
<script src="{{ asset('') }}js/jquery.form.js"></script>
<script src="{{ asset('') }}js/jquery.validate.min.js"></script>
<script src="{{ asset('') }}js/mail-script.js"></script>
<script src="{{ asset('') }}js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{ asset('') }}js/plugins.js"></script>
<script src="{{ asset('') }}js/main.js"></script>

</body>
</html>



