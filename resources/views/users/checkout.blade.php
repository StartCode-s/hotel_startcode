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
    <!--form order css css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/form-order.css') }}">
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
            <div class="container">
                <h1>Detail Purchase</h1>
                <div class="card mb-4">
                    <div class="form-container">
                        <h5>Summary</h5>
                        <div class="wrapper-table">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Room Type</td>
                                        <td>: <span class="text-primary">Deluxe Room</span></td>
                                    </tr>
                                    <tr>
                                        <td>Chek-in</td>
                                        <td>: {{ $data->check_in }}</td>
                                    </tr>
                                    <tr>
                                        <td>Chek-out</td>
                                        <td>: {{ $data->check_out }}</td>
                                    </tr>
                                    <tr>
                                        <td>Platform Fee</td>
                                        <td>: Rp 2.000</td>
                                    </tr>
                                    <tr>
                                        <td>Total Payable Amount</td>
                                        <td>: <span class="text-primary">{{ $data->total_harga }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="form-container">
                        <h5>Guest Detail</h5>
                        <div class="row">
                                <div class="col-6">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-input">
                                                    <label for="nameguest" class="form-label">Name Guest</label>
                                                    <input type="text" name="" id="nameguest" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button id="pay-button" class="button button-primary">Pay Now</button>
                                            </div>
                                        </div>
                                    </form>
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

    <!--Ion Icon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="{{ url('assets-user/js/index.js') }}"></script>


    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>
</body>

</html>
