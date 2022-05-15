@extends('layouts.base-user')

@section('css')
    <!--form order css css-->
    <link rel="stylesheet" href="{{ url('assets-user/css/form-order.css') }}">
@endsection


@section('content')
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
                        <div class="col-12">
                            <form action="">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-input">
                                            <label for="nameguest" class="form-label">Name Guest</label>
                                            <input type="text" name="guests" id="guests" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button id="pay-button" class="button button-primary" disabled>Pay
                                            Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        $('#guests').on('input', function(e) {
            $('#pay-button').attr('disabled', !$(this).val());
        });


        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    console.log(result);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/update-transaction",
                        method: "POST",
                        data: {
                            status: 'Success',
                            id: '{{ $data->id }}',
                            guests: $('#guests').val(),
                            result: result
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Good Job !',
                                text: 'Your Transaction has been Success',
                            }).then(function() {
                                window.location.href = "/transaction";
                            });
                        }
                    });
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/update-transaction",
                        method: "POST",
                        data: {
                            status: 'Pending',
                            id: '{{ $data->id }}',
                            guests: $('#guests').val(),
                            result: result
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'question',
                                title: 'Oops...',
                                text: 'Something Your Transaction is Pending',
                            }).then(function() {
                                window.location.href = "/transaction";
                            });
                        }
                    });
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/update-transaction",
                        method: "POST",
                        data: {
                            status: 'Error',
                            id: '{{ $data->id }}',
                            guests: $('#guests').val(),
                            result: result
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',

                            }).then(function() {
                                window.location.href = "/transaction";
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
