<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startcode Hotel</title>

    <!--Botstrap Assets-->
    <link rel="stylesheet" href="{{ url('assets-user/vendor/bootstrap/css/bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Public css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/app.css') }}">

    @yield('css')
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
                    <a href="/" class="sidebar-link">
                        <img src="{{ url('assets-user/images/icon/shopping-cart.png') }}" alt="">
                        Booking Room
                    </a>
                    <a href="/transaction" class="sidebar-link">
                        <img src="{{ url('assets-user/images/icon/history-icon.png') }}" alt="">
                        History
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();"> <img src="{{ url('assets-user/images/icon/logout-icon.png') }}" alt="">Logout</a>
                    </form>
                </div>
            </div>
        </div>

        @yield('content')


    </div>

    <!--Bundle JS Bootstrap-->
    <script src="{{ url('assets-user/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('assets-user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Ion Icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="{{ url('assets-user/js/index.js') }}"></script>

    @yield('js')
</body>

</html>
