@extends('layouts.base-user')


@section('content')
        <div class="container mt-5">
            <div class="card w-100">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('reception.search') }}" method="GET">
                            <div class="form-input mb-0">
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" name="order_code" class="form-control" placeholder="Booking Code Example CD4B4CXR">
                                    </div>
                                    <div class="col-1">
                                        <button class="button button-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
