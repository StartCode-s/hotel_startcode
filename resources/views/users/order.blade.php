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
    <!--search type room css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/search-typeroom.css') }}">
</head>

<body>

    <div id="main">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <div class="navbar-wrapper d-flex align-items-center w-100">
                    <div class="sidebar-button d-flex align-items-center">
                        <ion-icon name="reorder-three"></ion-icon>
                    </div>
                    <div class="brand-section d-flex justify-content-center w-100">
                        <a class="navbar-brand" href="#">
                            <img src="{{ url('assets-user/images/green-brand-logo.png') }}" alt="">
                            Startcode Hotel
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="sidebar-container">
            <div class="sidebar-wrapper">
                <div class="close-button">
                    <ion-icon name="close"></ion-icon>
                </div>
                <div class="brand-logo">
                    <img src="{{ url('assets-user/images/green-brand-logo.png') }}" alt="">
                    <h5>Startcode Hotel</h5>
                </div>
                <div class="sidebar-menu">
                    <p class="text-menu">User Menu</p>
                    <a href="#" class="sidebar-link">
                        <img src="{{ url('assets-user/images/icon/booking.png') }}" alt="">
                        Booking Room
                    </a>
                    <a href="#" class="sidebar-link">
                        <img src="{{ url('assets-user/images/icon/calendar.png') }}" alt="">
                        History
                    </a>
                    <p class="text-menu">Hotel Menu</p>
                    <a href="#" class="sidebar-link">
                        <img src="{{ url('assets-user/images/icon/buildings.png') }}" alt="">
                        Fasilitas Hotel
                    </a>
                </div>
            </div>
        </div>

        <div class="main-content explore-typeroom">
            <div class="banner-images">
                <img src="{{ url('assets-user/images/mockup-search-room.jpg') }}" alt="">
            </div>



            <div class="container-fluid result-search mt-4">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
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
                                            <input type="date" name="check_out" id="checkout" min="{{ date('Y-m-d') }}"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input">
                                            <label for="roomType" class="form-label">Room Type</label>
                                            <select class="form-select" name="tipe_id" id="roomType">
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
                                            <select class="form-select" name="adult" id="valueAdult">
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
                                            <select class="form-select" name="childreen" id="childvalue">
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
                                    <div class="col-12 mt-2">
                                        <button class="button button-primary w-100">Search Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            @if (is_null($data) || empty($data))
                            @else
                                @foreach ($data as $item)
                                    <div class="col-4">
                                        <a href="#" class="card card-items">
                                            <div class="image-room">
                                                <img src="{{ url('thumbKamar/'.$item->thumb) }}" alt="">
                                            </div>
                                            <div class="detail-room">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="name-room">{{ $item->nama }}</h5>
                                                    <div class="rating">
                                                        <ion-icon name="star"></ion-icon>
                                                        4.5
                                                    </div>
                                                </div>
                                                <div class="d-flex price">
                                                    <p class="price-room">{{ $item->harga }}</p>
                                                    <p>/Night</p>
                                                </div>
                                            </div>
                                            @if (DB::table('order')->where('kamar_id', $item->id)->where('check_in', '>=', $all['check_in'])->where('check_out', '<=', $all['check_out'])->exists())
                                                <button class="button btn-danger button-small mt-3" disabled>Non
                                                    Available</button>
                                            @else
                                                <form action="{{ route('checkout') }}" class="ord"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="room" value="{{ $item->id }}">
                                                    <button type="submit"
                                                        class="button button-primary button-small mt-3">Book
                                                        Hotel</button>
                                                </form>
                                            @endif
                                        </a>
                                    </div>
                                @endforeach
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

    <!--Ion Icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script>
        //Sidebar
        let sidebar = document.querySelector('.sidebar-container')
        let menubutton = document.querySelector('.sidebar-button')
        let mainClose = document.querySelector(".close-button")

        menubutton.addEventListener('click', function(e) {
            sidebar.classList.toggle('sidebar-active')
        });

        mainClose.addEventListener('click', function(e) {
            sidebar.classList.remove('sidebar-active')
        });



        $(".ord").on('submit', function() {

            var input = $("<input>").attr({
                "type": "hidden",
                "name": "req"
            }).val(JSON.stringify(@json($all)));

            $(this).append(input);
            return true;
        });
    </script>
    <script>
        function updatedate() {
            var firstdate = document.getElementById("checkin").value;
            document.getElementById("checkout").value = "";
            document.getElementById("checkout").setAttribute("min", firstdate);
        }
    </script>
</body>

</html>
