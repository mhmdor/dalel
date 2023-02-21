<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>REsult Search</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightbox.css') }}">
    <!--



-->
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
                                <li>
                                    <a class="scroll-to-section"> أهلا بك {{ Auth::user()->name }}</a>
                                </li>

                                <li class="has-sub">
                                    <a href="javascript:void(1)">حسابي</a>
                                    <ul class="sub-menu">
                                        <li>

                                            <a>معلوماتي</a>
                                            <a>المفضلة </a>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                                تسجيل خروج
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>

                                </li>




                            @endguest
                            <li class="scroll-to-section"><a href="#apply">تواصل معنا </a></li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">الصفحات</a>
                                <ul class="sub-menu">
                                    <li><a href="meetings.html">Upcoming Meetings</a></li>
                                    <li><a href="meeting-details.html">Meeting Details</a></li>
                                </ul>
                            </li>

                            <li class="scroll-to-section"><a href="#contact"> الرئيسية</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            الدليل السوري
                        </a>
                        <!-- ***** Logo End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <section class="heading-page header-text" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>نتائج البحث</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="meetings-page" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- <div class="col-lg-12">
              <div class="filters">
                <ul>
                  <li data-filter="*"  class="active">All Meetings</li>
                  <li data-filter=".soon">Soon</li>
                  <li data-filter=".imp">Important</li>
                  <li data-filter=".att">Attractive</li>
                </ul>
              </div>
            </div> -->
                        <div class="col-lg-12">
                            <div class="row grid">

                                @foreach ($place as $item)
                                    <div class="col-lg-4 templatemo-item-col all soon">
                                        <div class="meeting-item1">
                                            <div class="thumb">
                                                <div class="price">
                                                    <span>{{ $item->subcity->city->name }}</span>
                                                </div>
                                                <div class="price1">
                                                    <span>{{ $item->subcity->name }}</span>
                                                </div>
                                                <div class="price2">
                                                    <span>{{ $item->category->name }}</span>
                                                </div>
                                                <a href="{{ route('getplace', $item->id) }}"><img
                                                        src="{{ asset('uploads/logos/' . $item->logo) }}"
                                                        alt="{{ $item->logo }}"></a>
                                            </div>
                                            <div class="down-content text-center">
                                                <div class="date">

                                                </div>
                                                <a href="{{ route('getplace', $item->id) }}">
                                                    <h4>{{ $item->name }}</h4>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
              <div class="pagination">
                <ul>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div>
            </div> -->
                    </div>
                </div>
            </div>
        </div>
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

        <div class="footer">
            <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.
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
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
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
</body>


</body>

</html>
