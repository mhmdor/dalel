<!DOCTYPE html>
<html lang="en">

<head>
    <title>Discount</title>
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

            <form method="POST" action="{{route('storediscount')}}" class="contact100-form validate-form text-center" enctype="multipart/form-data">
                @csrf
                <span class="contact100-form-title">
                كوبون جديد
                </span>




                <div class="wrap-input100 validate-input" data-validate="place is required">
                    <span class="label-input100">المنشاة</span>
                    <select class="selection-2 text-center" name="place_id" id="place_id" required>
                        <option disabled selected>اختر المنشاة</option>

                        @foreach ($places as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('place_id')
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

                <div class="wrap-input100 validate-input" data-validate="image is required">
                    <span class="label-input100">الصورة</span>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                        name="image" value="{{ old('image') }}" required autocomplete="image">

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                
                <div class="wrap-input100 validate-input" data-validate="City is required">
                    <span class="label-input100">مميز</span>
                    <select class="selection-2 text-center" name="is_featured" id="is_featured" required>
                      

                      <option value="0">No</option>
                      <option value="1">Yes</option>
                    </select>
                    @error('is_featured')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                

                <div class="wrap-input100 validate-input" data-validate="City is required">
                    <span class="label-input100">النوع</span>
                    <select class="selection-2 text-center" name="role" id="role" required>
                        <option disabled selected>اختر النوع</option>

                      <option value="0">يومي</option>
                      <option value="1">اسبوعي</option>
                      <option value="1">شهري</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="value is required">
                    <span class="label-input100">القيمة</span>
                    <input id="value" type="number" class="form-control @error('value') is-invalid @enderror"
                        name="value" value="{{ old('value') }}" required autocomplete="value">

                    @error('value')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Expiration_date is required">
                    <span class="label-input100">تاريخ النهاية</span>
                    <input id="Expiration_date" type="datetime-local"  class="form-control @error('Expiration_date') is-invalid @enderror"
                        name="Expiration_date" value="{{ old('Expiration_date') }}" required autocomplete="Expiration_date">

                    @error('Expiration_date')
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





























