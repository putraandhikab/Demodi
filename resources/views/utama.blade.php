<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="icon" href="{{ url('assets/favicon.ico') }}">

	<title>Demodi - Dealer Mobil Digital</title>

	<link href="assets/css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/">
                    <img src="assets/img/icons/logo-01.png" width="200px">
                </a>
            <!--MENU-->
			@include('menu')
			</div>
		</nav>

        <!--Navbar-->
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          			<i class="hamburger align-self-center"></i>
        		</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                				<i class="align-middle" data-feather="settings"></i>
              				</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                				<img src="images/{{ Auth::user()->foto }}" class="avatar img-fluid rounded mr-1"/> <span class="text-dark">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
              				</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{ 'messages' }}"><i class="align-middle mr-1" data-feather="message-square"></i> Messages</a>
								<a class="dropdown-item" href="{{ url('users'.Auth::user()->id) }}"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
            <!--End Navbar-->
            
            <!--Content-->
			@yield('content')
            <!--End Content-->

		</div>
	</div>

	<script src="assets/js/vendor.js"></script>
	<script src="assets/js/app.js"></script>

	{{-- Function Calendar --}}
	<script>
		$(function() {
			$('#datetimepicker-dashboard').datetimepicker({
				inline: true,
				sideBySide: false,
				format: 'L'
				
			});
		});
	</script>
	{{-- End Function --}}

</body>
</html>