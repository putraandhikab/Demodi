<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- My CSS --}}
    <link rel="stylesheet" href="assets/css/register.css">

    <link rel="icon" href="{{ url('assets/favicon.ico') }}">

    <title>Register</title>
</head>

<body>
    <div class="registerwrap">
        <img src="assets/img/logo-04.png" width="350px">
        <p>Please enter your Username and Password </p>
        <div class="form">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="card-body">
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
                    <div class="form-group">
                        <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" placeholder="Nama Depan">
                        @error('firstname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Nama Belakang">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" placeholder="Nomor Telepon">
                        @error('phonenumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Registrasi</button>
            </form>
        </div>
    </div>
</body>
</html>