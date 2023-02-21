<!DOCTYPE html>
<html  lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assetsform/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div  class="wrap-contact100">
            
			<form  method="POST" action="{{ route('register') }}" class="contact100-form validate-form text-center">
				@csrf
				<span class="contact100-form-title">
					 حساب جديد 
				</span>

				<div dir="rtl" class="wrap-input100 validate-input" data-validate="name is required">
					<span class="label-input100">أسم المستخدم</span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

				<div dir="rtl" class="wrap-input100 validate-input" data-validate="fullname is required">
					<span class="label-input100">الأسم الثلاثي</span>
                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" >

                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="mobile is required">
					<span class="label-input100">الموبايل</span>
                    <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" >

                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="City is required">
					<span class="label-input100">المحافظة</span>
                        <select class="selection-2 text-center" name="city_id" id="city_id" required>
							@foreach ($cities as $item)

							<option value="{{$item->id}}">{{$item->name}}</option>
								
							@endforeach
						</select>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="email is required">
					<span class="label-input100">  { اختياري } الأيميل</span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

				

				<div class="wrap-input100 validate-input" data-validate="password is required">
					<span class="label-input100">كلمة السر</span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="password is required">
					<span class="label-input100">تأكيد كلمة السر</span>
                    <input id="password-confirm" type="password"  name="password_confirmation" class="form-control @error('password') is-invalid @enderror"  required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

               

				<a style="color: brown;font-size:18px;font-weight:600" href="{{route('login')}}">أملك حساب بالفعل . . . <span style="color: black;font-weight:800">تسجيل دخول الآن</span></a>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn">
							<span>
		                                    إنشاء حساب الآن
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
						
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<a style="color: white" href="{{route('home')}}"  class="contact100-form-btn">
							<span>
		                                      رجوع للرئيسية
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
	<script src="{{asset('frontend/assetsform/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/assetsform/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/assetsform/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('frontend/assetsform/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/assetsform/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/assetsform/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('frontend/assetsform/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/assetsform/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('frontend/assetsform/js/main.js')}}"></script>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
