@extends('layouts.base-user')


@section('content')
    <div class="container">
        <center>
            <br>
            <br>
            <h1>Reception Dashboard</h1>
            <br>
            <br>
        </center>

        <div class="d-flex w-100 justify-content-around">
            <div class="card">
                <div class="card-body">
                    @if ($data->is_check_in)
                        <center>
                            <h1>Already Check In</h1>
                        </center>
                    @else
                        <div class="d-flex flex-column mb-3 align-items-center">
                            {!! $checkInQr !!}
                            <a href="{{$checkin_code}}" class="button button-small button-success mt-3">Check-in</a>
                        </div>
                        <center>
                            <h2>Check In</h2>
                        </center>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @if ($data->is_check_out)
                        <center>
                            <h1>Already Check Out</h1>
                        </center>
                    @else
                        <div class="d-flex flex-column mb-3 align-items-center">
                            {!! $checkOutQr !!}
                            <a href="{{$checkout_code}}" class="button button-small button-success mt-3">Check-out</a>
                        </div>
                        <center>
                            <h2>Check Out</h2>
                        </center>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
