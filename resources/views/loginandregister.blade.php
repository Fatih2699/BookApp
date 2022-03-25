<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Mukta');

        body {
            font-family: 'Mukta', sans-serif;
            height: 100vh;
            min-height: 550px;
            background-image: url(https://i.pinimg.com/originals/67/18/22/671822c2f63dd5f65d8fd15c9710420b.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow-y: hidden;
        }

        a {
            text-decoration: none;
            color: #444444;
        }

        .login-reg-panel {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
            width: 70%;
            right: 0;
            left: 0;
            margin: auto;
            height: 400px;
            background-color: transparent;
        }

        .white-panel {
            background-color: transparent;
            height: 500px;
            position: absolute;
            top: -50px;
            width: 50%;
            right: calc(50% - 50px);
            transition: .3s ease-in-out;
            z-index: 0;
            box-shadow: 0 0 15px 9px #00000096;
        }

        .login-reg-panel input[type="radio"] {
            position: relative;
            display: none;
        }

        .login-reg-panel {
            color: #ffffff;
        }

        .login-reg-panel #label-login,
        .login-reg-panel #label-register {
            border: 1px solid #9e9e9e;
            padding: 5px 5px;
            width: 150px;
            display: block;
            text-align: center;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
        }

        .login-info-box {
            width: 30%;
            padding: 0 50px;
            top: 20%;
            left: 0;
            position: absolute;
            text-align: left;
        }

        .register-info-box {
            width: 30%;
            padding: 0 50px;
            top: 20%;
            right: 0;
            position: absolute;
            text-align: left;

        }

        .right-log {
            right: 50px !important;
        }

        .login-show,
        .register-show {
            z-index: 1;
            display: none;
            opacity: 0;
            transition: 0.3s ease-in-out;
            color: #242424;
            text-align: left;
            padding: 50px;
        }

        .show-log-panel {
            display: block;
            opacity: 0.9;
        }

        .login-show input[type="text"],
        .login-show input[type="password"] {
            width: 100%;
            display: block;
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #b5b5b5;
            outline: none;
        }

        .login-show input[type="submit"] {
            max-width: 150px;
            width: 100%;
            background: #444444;
            color: #f9f9f9;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            border-radius: 2px;
            float: right;
            cursor: pointer;
        }

        .login-show a {
            display: inline-block;
            padding: 10px 0;
        }

        .register-show input[type="text"],
        .register-show input[type="password"] {
            width: 100%;
            display: block;
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #b5b5b5;
            outline: none;
        }

        .register-show input[type="submit"] {
            max-width: 150px;
            width: 100%;
            background: #444444;
            color: #f9f9f9;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            border-radius: 2px;
            float: right;
            cursor: pointer;
        }

        .credit {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #3B3B25;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            z-index: 99;
        }

        a {
            text-decoration: none;
            color: #ff6804;
        }

    </style>
</head>

<body>
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Hesabım Var</h2>
            <br>
            <label id="label-register" for="log-reg-show">Giriş Yap</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
        </div>

        <div class="register-info-box">
            <h2>Hesabınız Yok Mu?</h2>
            <label id="label-login" for="log-login-show">Kayıt Ol</label>
            <input type="radio" name="active-log-panel" id="log-login-show">
        </div>

        <div class="white-panel">
            <form action="{{ route('login') }}" method="post" class="login-show">
                @csrf
                <h2 style="color: white">Giriş Yap</h2>
                @if (\Session::has('error'))
                    <div id="error" class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
                <div class="form-group has-error">
                    <input type="text" class="form-control 
                @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="password" class="form-control" name="password" placeholder="Şifre">
                <input type="submit" value="Giriş Yap">
                {{-- <a href="">Şifremi Unuttum?</a> --}}
            </form>
            <form action="{{ route('register') }}" method="post" class="register-show">
                <h2 style="color:white">Kayıt Ol</h2>
                @csrf
                @if (\Session::has('error'))
                    <div id="error" class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                @endif
                <input type="text" class="form-control" name="name" placeholder="İsim">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <input type="password" class="form-control" name="password" placeholder="Şifre">
                <input type="password" class="form-control" name="c_password" placeholder="Şifre Tekrar">
                <input type="submit" value="Kayıt Ol">
            </form>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('.login-info-box').fadeOut();
        $('.login-show').addClass('show-log-panel');
    });
    $('.login-reg-panel input[type="radio"]').on('change', function() {
        if ($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut();
            $('.login-info-box').fadeIn();

            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');

        } else if ($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();

            $('.white-panel').removeClass('right-log');

            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });
</script>

</html>
