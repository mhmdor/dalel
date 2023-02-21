<!DOCTYPE html>
<html lang="en">

<head>
    <title>place</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assetsform/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assetsform/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assetsform/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assetsform/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assetsform/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assetsform/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/assetsform/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assetsform/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assetsform/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>


    <div class="container-contact100">
        <div class="wrap-contact100">

            <form method="POST" class="contact100-form validate-form text-center" enctype="multipart/form-data">
                @csrf
                <span class="contact100-form-title">
                    منشأة جديد
                </span>





                <div class="wrap-input100 validate-input" data-validate="name is required">
                    <span class="label-input100">اسم المنشأة</span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="City is required">
                    <span class="label-input100">المحافظة</span>
                    <select class="selection-2 text-center" name="city_id" id="city_id" required>
                        <option disabled selected>اختر المحافظة</option>

                        @foreach ($Bcities as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="City is required">
                    <span class="label-input100">المنطقة</span>
                    <select class="selection-2 text-center" name="subcity_id" id="subcity_id" required>
                        <option disabled selected>اختر المنطقة</option>
                    </select>
                    @error('subcity_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="category is required">
                    <span class="label-input100">الصنف</span>
                    <select class="selection-2 text-center" name="category_id" id="category_id" required>
                        <option disabled selected>اختر الصنف</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="address is required">
                    <span class="label-input100"> العنوان التفصيلي</span>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                        name="address" value="{{ old('address') }}" required autocomplete="address">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="description is required">
                    <span class="label-input100">الوصف</span>
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') }}" required autocomplete="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="mobile is required">
                    <span class="label-input100">الموبايل</span>
                    <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror"
                        name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="telephone is required">
                    <span class="label-input100">الهاتف</span>
                    <input id="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror"
                        name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="logo is required">
                    <span class="label-input100">اللوغو</span>
                    <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror"
                        name="logo" value="{{ old('logo') }}" required autocomplete="logo">

                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>







                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span>
                                انشاء
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                        </button>

                    </div>
                </div>

                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <a style="color: white" href="{{ route('admin.home') }}" class="contact100-form-btn">
                            <span>
                                رجوع للوحة التحكم
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                        </a>

                    </div>
                </div>


            </form>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assetsform/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assetsform/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assetsform/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/assetsform/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assetsform/vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assetsform/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/assetsform/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assetsform/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('frontend/assetsform/js/main.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[id="city_id"]').on('change', function() {
                var brandId = $(this).val();
                $.ajax({
                    url: "/get-city/" + brandId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcity_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcity_id"]').append(
                                '<option value=' +
                                value.id + '>' + value.name +
                                '</option>');
                        })
                    }
                });
            })
        })
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>
















