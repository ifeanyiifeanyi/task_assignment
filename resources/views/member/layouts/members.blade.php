<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('') }}logo.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('') }}members/assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/flaticon.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/owl.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/animate.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/switcher-style.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('') }}members/assets/css/responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    @yield('css')

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">


        <!-- main header -->
        @include('member.layouts.header')
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        @include('member.layouts.mobileMenu')
        <!-- End Mobile Menu -->


        <!--Page Title-->
        <section class="page-title centred" style="background-image: url({{ asset("") }}members/assets/images/background/page-title-5.jpg);">
            <div class="auto-container">
                <div class="content-box clearfix">
                    <h1 id="dynamicTime">User Profile </h1>
                    <ul class="bread-crumb clearfix">
                        <li>@yield('title') </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container blog-details sec-pad-2">
            <div class="auto-container">

                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        @php
                            $profileFields = [
                                'photo',
                                'class',
                                'school',
                                'dioceses',
                                'parish_of_residence',
                                'home_parish',
                                'parish',
                                'address',
                            ];
                        @endphp
                        @if(collect($profileFields)->contains(function ($field) {
                            return empty(auth()->user()->$field);
                        }))
                            <div class="alert alert-danger bg-danger text-center text-white border-0" role="alert">
                                Please update your profile <br> <strong><a class="btn btn-outline-light waves-effect
                                waves-light" href="{{route('member.profile.view')}}">UPDATE</a></strong>
                            </div>
                        @endif
                        <div class="blog-sidebar">
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h4>User Profile </h4>

                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb"><a href="">
                                                <img src="{{auth()->user()->photo ? asset(auth()->user()->photo) : asset('no_image.jpg') }}" alt=""></a></figure>
                                        <h5><a href="blog-details.html">{{ Str::ucfirst(auth()->user()->name) }} </a></h5>
                                        <p>{{ Str::lower(auth()->user()->email) }}</p>
                                    </div>
                                </div>
                            </div>
                            @include('member.layouts.sidebar')

                        </div>
                    </div>



                    @yield('members')


                </div>
            </div>
        </section>
        <!-- sidebar-page-container -->

        <!-- subscribe-section -->
        @include('member.layouts.subscribe')
        <!-- subscribe-section end -->






        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ asset('') }}members/assets/js/jquery.js"></script>
    <script src="{{ asset('') }}members/assets/js/popper.min.js"></script>
    <script src="{{ asset('') }}members/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}members/assets/js/owl.js"></script>
    <script src="{{ asset('') }}members/assets/js/wow.js"></script>
    <script src="{{ asset('') }}members/assets/js/validation.js"></script>
    <script src="{{ asset('') }}members/assets/js/jquery.fancybox.js"></script>
    <script src="{{ asset('') }}members/assets/js/appear.js"></script>
    <script src="{{ asset('') }}members/assets/js/scrollbar.js"></script>
    <script src="{{ asset('') }}members/assets/js/isotope.js"></script>
    <script src="{{ asset('') }}members/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('') }}members/assets/js/jQuery.style.switcher.min.js"></script>
    <script src="{{ asset('') }}members/assets/js/jquery-ui.js"></script>
    <script src="{{ asset('') }}members/assets/js/product-filter.js"></script>

    <!-- main-js -->
    <script src="{{ asset('') }}members/assets/js/script.js"></script>
    <script>
        // Function to update time in the h1 tag
        function updateTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            // Convert to 12-hour format
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;

            // Add leading zeros if needed
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            // Update the content of the h1 tag
            $("#dynamicTime").text(hours + ":" + minutes + ":" + seconds + " " + ampm);
        }

        // Update the time every second
        setInterval(updateTime, 1000);

        // Initial call to set the initial time
        updateTime();
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        let type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif

    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



    @yield('js')
</body><!-- End of .page_wrapper -->
</html>
