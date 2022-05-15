<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantsasri - Dashboard</title>

    <!--Bootstrap Assets-->
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/icons-1.7.2/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

    <!--CSS Component For Layouting-->
    <link rel="stylesheet" href="{{ url('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/preloader.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Styling Custom admin blade-->
    <style>
        @media screen and (min-width : 0px) {
            .alert {
                margin: 0 1rem;
            }
        }

        @media screen and (min-width : 1200px) {
            .alert {
                margin: 0 2.3rem;
            }
        }

    </style>

    @yield('css')
</head>

<body>
    <div class="wrapperPreloader">
        <div id="loader"></div>
    </div>
    <div id="app">
        <div id="sidebarMain">
            <div class="wrapperSidebar">
                {{-- <div class="brandLogo">
                    <img src="{{ url('assets/img/plantsasriLogo.png') }}" alt="">
                </div> --}}
                <a href="" class="profile">
                    <div class="imagesProfile">
                        <img src="{{ url('assets/img/faces.jpg') }}" alt="">
                    </div>
                    <div class="profileUser">
                        <h5 class="labelDay">Hai,</h5>
                        <h5 class="nameUser">{{ Auth::user()->name }}</h5>
                    </div>
                </a>
                @yield('menu')
            </div>
        </div>
        <div id="main">
            <div class="headMain">
                <div class="brand-section">
                    <div class="iconBrand">
                        <img src="{{ url('assets/img/plantsasriLogo.png') }}" alt="">
                    </div>
                    <div class="sidebarButton">
                        <img src="{{ url('assets/img/menuButton.svg') }}" alt="" class="menuButton">
                    </div>
                </div>

                <div class="user-action">
                    <div class="logoutAction">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();"> <img src="{{ url('assets/img/powerIcon.svg') }}" alt=""></a>
                        </form>
                    </div>
                </div>
            </div>



            @if (session('status'))
            <br>
                <div class="alert alert-{{ session('status') }}">
                    {{ session('message') }}
                </div>
            @endif
            @if ($errors->any())
            <br>
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </div>


    <!--Vendor-->
    <!--Jquery-->
    <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
    <!--Bootstrap JS-->
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!--Ion Icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!--Datatable By Bootstrap-->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ url('assets/js/app.js') }}"></script>
    <!-- Script -->
    <script>
        $('button[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    </script>
    @yield('js')

</body>

</html>
