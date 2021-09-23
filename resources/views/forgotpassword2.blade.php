<!doctype html>
<html lang="en">
  <head>
  	<title>Login Demodi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/login.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(assets/img/login.png);"></div>
                            <div class="login-wrap p-4 p-md-5">
                                <div class="d-flex">
                                    <div class="w-100">
                                        <h3 class="mb-4">Forgot Password</h3>
                                    </div>
                                </div>
                                <h6 class="mb-4">Please enter your new password.</h6>
                                <form action="{{ route('forgotpasswordProcess') }}" method="post" class="signin-form">
                                    @csrf
                                        @if (Session::has('success'))
                                        <script>
                                            alert('{{ Session::get('success') }}');
                                        </script>
                                        @endif
                                        @if (Session::has('error'))
                                            <script>
                                                alert('{{ Session::get('error') }}');
                                            </script>
                                        @endif
                                        <div class="form-group mb-3">
                                            <label class="label" for="password">New Password</label>
                                          <input type="password" name="password" id="myInput1" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                          <span class="eye" onclick="myFunction()">
                                          <i id="hide1" class="fa fa-eye" id="eye"></i>
                                          <i id="hide2" class="fa fa-eye-slash"></i>
                                          </span>
                                      @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="password">Confirm Password</label>
                                          <input type="password" name="password_confirmation" id="myInput2" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password">
                                          <span class="eye" onclick="myFunction2()">
                                          <i id="hide3" class="fa fa-eye" id="eye"></i>
                                          <i id="hide4" class="fa fa-eye-slash"></i>
                                          </span>
                                      @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Reset Password</button>
                                        </div>
                                </form>
                            </div>
		                </div>
				    </div>
                </div>
			</div>
		</div>
    </section>
    
    <script>
        var state= false;
        function myFunction(){
            var x = document.getElementById("myInput1");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if(x.type === 'password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }
            else{
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>

    <script>
        var state= false;
        function myFunction2(){
            var x = document.getElementById("myInput2");
            var y = document.getElementById("hide3");
            var z = document.getElementById("hide4");

            if(x.type === 'password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }
            else{
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    
	</body>
</html>