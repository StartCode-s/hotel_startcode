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
    <!--invoice css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/invoice.css') }}">
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

        <div class="main-content mt-5">
            <div class="container ">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    <div class="card mb-3">
                        <div class="wrapper-table">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <div class="images"
                                                style="background-color: rgb(28, 139, 22); width: fit-content; padding: 1rem; border-radius: 50%;">
                                                <img style="width: 100%; max-width : 48px;"
                                                    src="{{ url('assets-user/images/white-check.svg') }}" alt="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center"
                                            style="padding: 1rem 0 .5rem  0; font-weight :600; font-size :20px;">Booking
                                            Paid</td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <table
                                                style="width: 100%; max-width: 500px; margin: 2rem 0; border-collapse: separate; border-spacing: 8px;">
                                                <tbody>
                                                    <tr>
                                                        <td style="font-size: 14px; text-align: start;" align="center">
                                                            Payment ID :</td>
                                                        <td align="right">
                                                            <span
                                                                class="status success-status">{{ $data->transaction_id }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 14px; text-align: start;" align="center">
                                                            Payment Methode :</td>
                                                        <td align="right" style="font-size: 14px; text-align: end"
                                                            class="text-primary">{{ $data->payment_method }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 14px; text-align: start;" align="center">
                                                            Booking ID :</td>
                                                        <td align="right" style="font-size: 14px; text-align: end"
                                                            class="text-primary">{{ $data->order_code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="font-size: 14px; text-align: start;">
                                                            Name Guest :</td>
                                                        <td align="right" style="font-size: 14px; text-align: end">
                                                            {{ $data->guest_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="font-size: 14px; text-align: start;">
                                                            Room Type :</td>
                                                        <td align="center" style="font-size: 14px; text-align: end;">
                                                            {{ DB::table('kamar')->where('id', $data->kamar_id)->first()->nama }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="font-size: 14px; text-align: start;">
                                                            Chek-in :</td>
                                                        <td align="center" style="font-size: 14px; text-align: end;">
                                                            {{ $data->check_in }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" style="font-size: 14px; text-align: start;">
                                                            Check-out :</td>
                                                        <td align="center" style="font-size: 14px; text-align: end;">
                                                            {{ $data->check_out }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card d-flex align-items-center" style="padding: 1rem;">
                        <p style="text-align: center; font-weight: 600; margin-bottom: .5rem;">Cetak Invoice</p>
                        <button onclick="window.print()" class="button button-primary button-small" style="width: fit-content;">Cetak</button>
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

    <script src="{{ url('assets-user/js/index.js') }}"></script>

</body>

</html>
