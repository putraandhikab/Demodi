<!doctype html>
<html lang="en">
  <head>
  	<title>Login Demodi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/login.css">

  <link rel="icon" href="{{ url('assets/favicon.ico') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(assets/img/login.png);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Login</h3>
			      		</div>
			      	</div>
							<form action="{{ route('login') }}" method="post" class="signin-form">
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
			      			<label class="label" for="name">Username</label>
			      			<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                  @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" name="password" id="myInput" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                      <span class="eye" onclick="myFunction()">
                      <i id="hide1" class="fa fa-eye" id="eye"></i>
                      <i id="hide2" class="fa fa-eye-slash"></i>
                      </span>
                      
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
		            </div>
		            <div class="form-group d-md-flex">
						<div class="text-md">
							<a href="{{ url('forgotpassword1') }}">Forgot Password</a>
						</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

    <script>
        var state= false;
        function myFunction(){
            var x = document.getElementById("myInput");
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

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>

	</body>
</html>

