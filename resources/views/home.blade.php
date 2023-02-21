<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Aldalel</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightbox.css') }}">

</head>

<body>

    <!-- Sub Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="right-icons">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-telegram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">

                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            أسم الموقع
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            @guest
                                <li>
                                    <a class="scroll-to-section" href="{{ route('login') }}">تسجيل دخول</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a class="scroll-to-section" href="{{ route('register') }}">حساب جديد</a>
                                    </li>
                                @endif
                            @else
                                <li class="has-sub">
                                    <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                                تسجيل خروج
                                            </a>


                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>

                                    </ul>

                                </li>
                                <li>
                                    <a class="scroll-to-section" href="{{ route('discountUser') }}">الكوبونات الخاصة بي </a>
                                </li>
                                @if (Auth::user()->is_premium == '1')
                                    <li>
                                        <a class="scroll-to-section" href="{{ route('discountUser') }}">كوبونات مميزة</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="scroll-to-section" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip"
                                            data-bs-title="عذرا , مخصص للاشتراكات ال peimium">
                                            كوبونات مميزة
                                        </a>
                                    </li>
                                @endif






                            @endguest
                            <li class="scroll-to-section"><a href="#apply">تواصل معنا </a></li>



                            <li class="scroll-to-section"><a href="#contact"> الرئيسية</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->




    <!-- ======= Hero Section ======= -->
    <section id="hero" class="header-text">
        <div class="hero-container">
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
            <div class="hero-logo" data-aos="zoom-in">
                <img src="{{ asset('frontend/assets/images/logo1.png') }}" alt="">
            </div>

            <h2>أسم الموقع</h2>
            <h1 data-aos="zoom-in">دليلك الأشمل في سورية</h1>

            <div class="container">
                @guest
                    @if (Route::has('register'))
                        <div class="row">

                            <div class="col">

                                <a href="{{ route('register') }}" data-aos="fade-up" data-aos-delay="200"
                                    class="btn-get-started scrollto"> حساب جديد
                                    مجاني</a>

                            </div>
                            <div class="col">

                                <a data-aos="fade-up" data-aos-delay="200" href="{{ route('login') }}"
                                    class="btn-get-started scrollto"> تسجيل دخول</a>

                            </div>

                        </div>
                    @endif
                @else
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('searchplace') }}" data-aos="fade-up" data-aos-delay="200"
                                class="btn-get-started scrollto"> بحث في
                                الدليل</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('searchdiscount') }}" data-aos="fade-up" data-aos-delay="200"
                                class="btn-get-started scrollto"> بحث عن كوبونات</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('searchplace') }}" data-aos="fade-up" data-aos-delay="200"
                                class="btn-get-started scrollto"> بحث عن مسابقات</a>
                        </div>
                    </div>
                @endguest
            </div>


        </div>
    </section><!-- End Hero -->
    <!-- ***** Main Banner Area End ***** -->

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-service-item owl-carousel">
                        @foreach ($slides as $item)
                            <div class="item">
                                <div class="icon">
                                    <img src="{{ asset('uploads/slide/' . $item->image) }}"
                                        alt="{{ $item->image }}">
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>مسابقات حصرية</h2>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        @if ($copouns == '[]')
                            <h3
                                style="color:white ; text-align: center;background-color:#a12c2f;padding:5px;border-radius: 22px;">
                                عذرا لا يوجد مسابقات الآن , حاول لاحقا</h3>
                        @else
                            @foreach ($copouns as $item)
                            @if ($item->is_featured == 1 )
                            @if ($is_premium ==1)
                            <div class="col-lg-4">
                                <div class="meeting-item">
                                    <div class="thumb">
                                        <div class="price">
                                            <span>جائزة بقيمة {{ $item->value }} ليرة سورية</span>
                                        </div>
                                        <div class="primeum">
                                            <span>مسابقة مميزة</span>
                                       
                                        </div>
                                        <a data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $item->id }}"><img
                                                src="{{ asset('uploads/coupons/' . $item->image) }}"
                                                alt="New Lecturer Meeting"></a>
                                    </div>
                                    <a data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $item->id }}">
                                        <div class="down-content text-center">

                                            <h4>{{ $item->place->name }}</h4>

                                            <h5>{{ $item->description }}</h5>
                                            @php
                                                
                                                Carbon\Carbon::setLocale('ar');
                                                
                                            @endphp

                                            <p> تنتهي بعد
                                                {{ Carbon\Carbon::parse($item->Expiration_date)->diffForHumans() }}
                                            </p>

                                            <!-- Button trigger modal -->

                                        </div>
                                    </a>

    

                                </div>
                            </div>   
                            @else
                            <div class="col-lg-4">
                                <div class="meeting-item">
                                    <div class="thumb">
                                        <div class="price">
                                            <span>جائزة بقيمة {{ $item->value }} ليرة سورية</span>
                                        </div>
                                        <div class="primeum">
                                            <span>مسابقة مميزة</span>
                                       
                                        </div>
                                        <a data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $item->id }}noprimium"><img
                                                src="{{ asset('uploads/coupons/' . $item->image) }}"
                                                alt="New Lecturer Meeting"></a>
                                    </div>
                                    <a data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $item->id }}noprimium">
                                        <div class="down-content text-center">

                                            <h4>{{ $item->place->name }}</h4>

                                            <h5>{{ $item->description }}</h5>
                                            @php
                                                
                                                Carbon\Carbon::setLocale('ar');
                                                
                                            @endphp

                                            <p> تنتهي بعد
                                                {{ Carbon\Carbon::parse($item->Expiration_date)->diffForHumans() }}
                                            </p>

                                            <!-- Button trigger modal -->

                                        </div>
                                    </a>

    

                                </div>
                            </div> 
                                
                            @endif
                            
                            @else
                            <div class="col-lg-4">
                                <div class="meeting-item">
                                    <div class="thumb">
                                        <div class="price">
                                            <span>جائزة بقيمة {{ $item->value }} ليرة سورية</span>
                                        </div>
                                        <a data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $item->id }}"><img
                                                src="{{ asset('uploads/coupons/' . $item->image) }}"
                                                alt="New Lecturer Meeting"></a>
                                    </div>
                                    <a data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop{{ $item->id }}">
                                        <div class="down-content text-center">

                                            <h4>{{ $item->place->name }}</h4>

                                            <h5>{{ $item->description }}</h5>
                                            @php
                                                
                                                Carbon\Carbon::setLocale('ar');
                                                
                                            @endphp

                                            <p> تنتهي بعد
                                                {{ Carbon\Carbon::parse($item->Expiration_date)->diffForHumans() }}
                                            </p>

                                            <!-- Button trigger modal -->

                                        </div>
                                    </a>

                                    

                                </div>
                            </div>   
                            @endif
                            
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $item->id }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-size: 25px;font-weight:bold"
                                                class="modal-title" id="staticBackdropLabel">
                                                {{ $item->place->name }}</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div style="color:#a12c2f; font-size:20px;font-weight:bold"
                                            class="modal-body text-center">
                                            هل أنت متأكد من التقديم لهذه المسابقة </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">لا</button>
                                            <a style="width: 200x" class="btn btn-success"
                                                href="{{ route('usercopoun', $item->id) }}">
                                                نعم
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $item->id }}noprimium"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-size: 25px;font-weight:bold"
                                                class="modal-title" id="staticBackdropLabel">
                                                {{ $item->place->name }}</h5>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div style="color:#a12c2f; font-size:20px;font-weight:bold"
                                            class="modal-body text-center">عذرا المسابقة مخصصة للأشتراكات المميزة</div>
                                        <div class="modal-footer">

                                          
                                            <a style="width: 200x" class="btn btn-success"
                                                href="{{ route('premium') }}">
                                                 طلب أشتراك مميز
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            @endforeach
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>كوبونات حصرية</h2>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        @if ($discount == '[]')
                            <h3
                                style="color:white ; text-align: center;background-color:#a12c2f;padding:5px;border-radius: 22px; margin:5px">
                                عذرا لا يوجد كوبونات الآن , حاول لاحقا</h3>
                        @else
                            @foreach ($discount as $item)
                                <div class="col-lg-6 templatemo-item-col">
                                    <div class="meeting-item">
                                        <div class="thumb">
                                            <div class="price">
                                                <span>حسم بقيمة {{ $item->value }} %</span>
                                            </div>
                                            <a data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop{{ $item->id }}"><img
                                                    src="{{ asset('uploads/discounts/' . $item->image) }}"
                                                    alt="New Lecturer Meeting"></a>
                                        </div>
                                        <a data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $item->id }}">
                                            <div class="down-content text-center">

                                                <h4>{{ $item->place->name }}</h4>

                                                <h5>{{ $item->description }}</h5>
                                                @php
                                                    
                                                    Carbon\Carbon::setLocale('ar');
                                                    
                                                @endphp

                                                <p> تنتهي بعد
                                                    {{ Carbon\Carbon::parse($item->Expiration_date)->diffForHumans() }}
                                                </p>

                                                <!-- Button trigger modal -->

                                            </div>
                                        </a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $item->id }}"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-size: 25px;font-weight:bold"
                                                            class="modal-title" id="staticBackdropLabel">
                                                            {{ $item->place->name }}</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div style="color:#a12c2f; font-size:20px;font-weight:bold"
                                                        class="modal-body text-center">
                                                        هل أنت متأكد من الحصول على هذا الكوبون </div>
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">لا</button>
                                                        <a style="width: 200x" class="btn btn-success"
                                                            href="{{ route('userdiscount', $item->id) }}">
                                                            نعم
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-facts">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>أسم الموقع</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-area-content ">
                                        <div class="count-digit">94</div>
                                        <div class="count-title">عدد الفعاليات</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="count-area-content">
                                        <div class="count-digit">126</div>
                                        <div class="count-title">عدد الاصناف</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="count-area-content new-students">
                                        <div class="count-digit">2345</div>
                                        <div class="count-title">عدد المستخدمين</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="count-area-content">
                                        <div class="count-digit">32</div>
                                        <div class="count-title">الجوائز</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <a href="{{ route('searchplace') }}">
                        <div class="video">
                            بحث في الدليل
                        </div>
                    </a>


                </div>
            </div>
        </div>
    </section>

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





    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 align-self-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="contact" action="" method="post">
                                <div class="row text-center">
                                    <div class="col-lg-12">
                                        <h2>أرسل رسالة لنا</h2>
                                    </div>
                                    <div class="col-lg-4 text-center">
                                        <fieldset>
                                            <input name="name" type="text" id="name"
                                                placeholder="*...أسمك" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="email" type="text" id="email"
                                                pattern="[^ @]*@[^ @]*" placeholder=" ...أيميلك" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-4">
                                        <fieldset>
                                            <input name="subject" type="text" id="subject"
                                                placeholder="*...الموضوع" required="">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="message" type="text" class="form-control" id="message" placeholder=" ...رسالتك"
                                                required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="button">أرسال</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-info text-center">
                        <ul>
                            <li>
                                <h6>الموبايل</h6>
                                <span>010-020-0340</span>
                            </li>
                            <li>
                                <h6>الأيميل</h6>
                                <span>info@meeting.edu</span>
                            </li>
                            <li>
                                <h6>العنوان</h6>
                                <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>
                            </li>
                            <li>
                                <h6>موقع الويب</h6>
                                <span>www.meeting.edu</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Copyright © dalelsyria2022. All Rights Reserved.
                <br>
                Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>
                <br>
            </p>
        </div>
    </section>
    <div id="preloader"></div>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/video.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
    <script>
        $("#myElem").show().delay(8000).fadeOut();
    </script>
    <script>
        (function() {
            "use strict";
            let preloader = select('#preloader');
            if (preloader) {
                window.addEventListener('load', () => {
                    preloader.remove()
                });
            }
        });
    </script>
    <script>
        (function() {
            "use strict";


            let preloader = select('#preloader');
            if (preloader) {
                window.addEventListener('load', () => {
                    preloader.remove()
                });
            }



        });
    </script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>



</body>

</body>

</html>
