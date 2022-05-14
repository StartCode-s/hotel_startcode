<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <form method="POST" action="{{ route('checkout-non-register') }}">
        @csrf

        <input type="hidden" name="data" value="{{$data}}">
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="password">
        <input type="text" name="password_confirmation">

        <button class="btn btn-success">Submit</button>
    </form>

</body>
</html>
