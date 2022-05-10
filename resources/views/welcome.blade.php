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
    <!--Home css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/home.css') }}">
</head>
<body>

    <div id="home">
        <!-- <nav class="navbar navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="{{ url('assets-user/images/brand-logo.png') }}" alt="">
                Startcode Hotel
              </a>
            </div>
        </nav> -->

        <div class="home-content">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-7">
                        <h1 class="text-home">Find Your Awesome Room</h1>
                    </div>
                    <div class="col-5">
                        <div class="card">
                            <div class="head-card">
                                <h5>Booking Rooms</h5>
                                <p>booking your favorite rooms in startcode hotel</p>
                            </div>
                            <form action="">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="checkin" class="form-label">Check-in</label>
                                            <input type="date" name="" id="checkin" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="checkout" class="form-label">Check-out</label>
                                            <input type="date" name="" id="checkout" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="roomValue" class="form-label">Room Value</label>
                                            <input type="number" name="" id="roomValue" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="roomType" class="form-label">Room Type</label>
                                            <select class="form-select" name="" id="roomType">
                                                <option value="1">Select Room Type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="valueAdult" class="form-label">Adult</label>
                                            <input type="number" name="" id="valueAdult" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="childvalue" class="form-label">Children</label>
                                            <input type="number" name="" id="childvalue" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="button button-primary w-100">Book Now</button>
                                    </div>
                                </div>
                            </form>

                            <div class="sign-account mt-4">
                                <p>Want to login or register account?</p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="me-2">Login</a>
                                    <a href="#">Register</a>
                                </div>
                            </div>
                        </div>
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
