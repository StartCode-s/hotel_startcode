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
                    <div class="col-12 col-lg-7 mb-5 mb-lg-0">
                        <h1 class="text-home">Find Your Awesome Room</h1>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="card">
                            <div class="head-card">
                                <h5>Booking Rooms</h5>
                                <p>booking your favorite rooms in startcode hotel</p>
                            </div>
                            <form action="{{ route('order') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="checkin" class="form-label">Check-in</label>
                                            <input type="date" name="check_in" id="checkin" min="{{ date('Y-m-d') }}"
                                                class="form-control" onchange="updatedate();" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="checkout" class="form-label">Check-out</label>
                                            <input type="date" name="check_out" id="checkout"
                                                min="{{ date('Y-m-d') }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input">
                                            <label for="roomType" class="form-label">Room Type</label>
                                            <select class="form-select" name="tipe_id" id="roomType" required>
                                                <option value="" selected>Select All Type Room</option>
                                                @foreach (DB::table('tipe_kamar')->get() as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="valueAdult" class="form-label">Adult</label>
                                            <select class="form-select" name="adult" id="valueAdult" required>
                                                <option value="" selected>Select Count</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <label for="childvalue" class="form-label">Children</label>
                                            <select class="form-select" name="childreen" id="childvalue" required>
                                                <option value="" selected>Select Count</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <button class="button button-primary w-100">Search Now</button>
                                    </div>
                                </div>
                            </form>

                            @if (!Auth::check())
                                <div class="sign-account mt-4">
                                    <p>You have to login or register first !</p>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('login') }}" class="me-2">Login</a>
                                        <a href="{{ route('register') }}">Register</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Bundle JS Bootstrap-->
    <script src="{{ url('assets-user/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets-user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }

        function formatDate(date) {
            return [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-');

        }

        function updatedate() {
            var firstdate = document.getElementById("checkin").value;
            document.getElementById("checkout").value = "";
            // Create new Date instance
            var date = new Date(firstdate);

            // Add a day
            date.setDate(date.getDate() + 1);

            console.log(formatDate(date));
            document.getElementById("checkout").setAttribute("min", formatDate(date));
        }
    </script>
</body>

</html>
