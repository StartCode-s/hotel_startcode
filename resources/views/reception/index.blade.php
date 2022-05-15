@extends('layouts.base-user')


@section('content')
        <center><h1>Reception Dashboard</h1></center>
        <br>

        <form action="{{ route('reception.search') }}" method="GET">

            <input type="text" name="order_code">
            <button type="submit">Search</button>
        </form>
@endsection
