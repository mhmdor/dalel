<!DOCTYPE html>
<html  lang="en">
<head>
	<title>code</title>
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
            
			<form  method="POST" action="{{route('accessCode')}}"  class="contact100-form validate-form text-center">
				@csrf
				<span style="color: green" class="contact100-form-title">
					    الكود صحيح بأسم  {{$user->name}}
				</span>


				<h5 style="margin: 30px;font-weight:800"> %حسم بقيمة {{$discount->value}}</h5>
				

				

				<div class="wrap-input100 validate-input" data-validate="price is required">
					<span class="label-input100">السعر دون الحسم</span>
                    <input style="font-size: 25px" id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" >
                   <input type="text" name="code" value="{{$code}}" hidden >
				   <input type="text" name="discount_id" value="{{$discount->id}}" hidden>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
					<span class="focus-input100"></span>
				</div>

				


				
				<div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div style="font-size: 25px;color: #000000;font-weight: bold;"
                                class="text-center">  قيمة الفاتورة بعد الحسم <div  id="output"></div>
                            </div>

                        </div>
                       
                    </div>
                </div>
               


				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn">
							<span>
		                                     استخدام   
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
						
					</div>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<a style="color: white" href="{{route('owner.home')}}"  class="contact100-form-btn">
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

<script>
	$(document).ready(function() {
		$("#price").on("input", function() {
			var a = {{ "$discount->value" }};
			var b = $(this).val();
			var c = (parseFloat(b) * parseFloat(a)) / 100  ;
			$("#output").text(c);
		});
	});
</script>

</body>
</html>
