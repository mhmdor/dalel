<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>المسابقة </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('backend/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-bell me-3"></i>المسابقة</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            {{-- <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href="{{ route('logout') }}" class="nav-item nav-link">تسجيل خروج</a>
            </div> --}}
        </div>
    </nav>
    <!-- Navbar End -->




    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                @if (\Session::has('success'))
                    <div style="width: 100%" id="myElem" class="alert alert-success text-center">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if (\Session::has('failed'))
                    <div style="width: 100%" id="myElem" class="alert alert-danger text-center">
                        <ul>
                            <li>{!! \Session::get('failed') !!}</li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h4 class="section-title bg-white text-center text-primary px-3">{{ $coupon->description }}</h4>

                <h1 class="mb-5">{{ $coupon->place->name }}</h1>
            </div>
            <div class="row g-4">

                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">


                    <div style="background-color:rgb(231, 231, 231)" class="service-item text-center pt-3">

                        <div class="p-4">
                            <h1 style="color: #a12c2f;">جائزة بقيمة {{ $coupon->value }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">


                    <div style="background-color:rgb(231, 231, 231)" class="service-item text-center pt-3">

                        <div class="p-4">
                            <h1 style="color: #a12c2f;">عدد المشتركين {{ $users }}</h1>
                        </div>
                    </div>
                </div>
                <a href="{{route('winnerusers',$coupon->id)}}">
                    <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">


                        <div class="service-item text-center pt-3">

                            <div class="p-4">
                                <h1 style="color: white">بدء السحب</h1>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>
    <!-- Service End -->
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container">

            <div class="row">

                <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in">
                    <img src="{{ asset('frontend/assets/images/clients/client-1.png') }}" class="img-fluid"
                        alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('frontend/assets/images/clients/client-2.png') }}" class="img-fluid"
                        alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('frontend/assets/images/clients/client-3.png') }}" class="img-fluid"
                        alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('frontend/assets/images/clients/client-4.png') }}" class="img-fluid"
                        alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="400">
                    <img src="{{ asset('frontend/assets/images/clients/client-5.png') }}" class="img-fluid"
                        alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6" data-aos="zoom-in" data-aos-delay="500">
                    <img src="{{ asset('frontend/assets/images/clients/client-6.png') }}" class="img-fluid"
                        alt="">
                </div>

            </div>

        </div>
    </section><!-- End Clients Section -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend/assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('backend/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('backend/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
    <script>
        $("#myElem").show().delay(3000).fadeOut();
    </script>
</body>

</html>
