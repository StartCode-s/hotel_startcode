<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startcode Hotel</title>

    <!--Botstrap Assets-->
    <link rel="stylesheet" href="{{ url('assets-user/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--Public css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/app.css') }}">
    <!--auth css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/auth.css') }}">
</head>
<body>

    <div id="auth">
        <div class="container">
            <div class="auth-wrapper">
                <div class="card">
                    <div class="header-card">
                        <h3>Register Account</h3>
                        <p>Created your account</p>
                    </div>
                    <div class="body-card">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-input">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Fill your name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input">
                                        <label for="email" class="form-label">Your email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Fill your email">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Fill your password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="button button-primary w-100">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Bundle JS Bootstrap-->
    <script src="{{ url('assets-user/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets-user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
