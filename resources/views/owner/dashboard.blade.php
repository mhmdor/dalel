<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>owner </title>
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
            <h2 class="m-0 text-primary"><i class="fa fa-bell me-3"></i>{{ $owner->name }}</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href="{{ route('admin.logout') }}" class="nav-item nav-link">تسجيل خروج</a>
            </div>
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
                <h6 class="section-title bg-white text-center text-primary px-3">لوحة التحكم</h6>
                <h1 class="mb-5">{{ $owner->place->name }}</h1>
            </div>
            <div class="row g-4">

                <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="service-item text-center pt-3">

                            <div class="p-4">
                                <i class="fa fa-3x fa-plus text-primary mb-4"></i>
                                <h5 class="mb-3">استعلام عن كوبون </h5>

                            </div>

                        </div>
                    </a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">اختر الكوبون </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">


                                @foreach ($discount as $item)
                                    <div class="col-lg-12 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                            <div class="service-item text-center pt-3">

                                                <div class="p-4">
                                                    <h4 class="mb-3">{{ $item->description }}</h4>
                                                    <h5 class="mb-3">قيمة الحسم {{ $item->value }}</h5>

                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    <div style="height:15px"></div>
                                    <!-- Modal code -->
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel"> أدخل الكود
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('confirmCode') }}">
                                                    @csrf
                                                    <div class="modal-body">



                                                        <div class="wrap-input100 validate-input text-center"
                                                            data-validate="code is required">
                                                            <h4 class="label-input100">أدخل الكود الموجود مع الزبون</h4>
                                                            <input type="text" name="id" value="{{$item->id}}" hidden>
                                                            <input id="code" type="text"
                                                                class="input100 form-control @error('code') is-invalid @enderror"
                                                                name="code" required
                                                                autocomplete="Old-password">

                                                            @error('code')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <span class="focus-input100"></span>
                                                        </div>
                                                       

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-dark">بحث</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                            <div class="modal-footer">

                            </div>

                        </div>
                    </div>
                </div>



                {{-- <h2>
                  @foreach ($discount as $item)
                  @foreach ($item->users as $item1)
                  {{$item1->name}}
                      {{$item1->pivot->code}}
                  @endforeach
                      
                  @endforeach
            
            </h2> --}}







            </div>
        </div>
    </div>
    <!-- Service End -->





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
