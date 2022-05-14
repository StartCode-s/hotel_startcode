@extends('layouts.base')


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
@endsection

@section('menu')
    <div class="sidebar-menu-wrapper">
        <li class="listMenuName">
            <p>Admin Menu</p>
        </li>
        <li class="list-menu ">
            <div class="icon">
                <ion-icon name="grid"></ion-icon>
            </div>
            <a href="/admin" class="sidebar-menu">Dashboard Admin</a>
        </li>
        <li class="list-menu ">
            <div class="icon">
                <ion-icon name="grid"></ion-icon>
            </div>
            <a href="/admin/kamar" class="sidebar-menu">Kamar</a>
        </li>
        <li class="list-menu ">
            <div class="icon">
                <ion-icon name="grid"></ion-icon>
            </div>
            <a href="/admin/order" class="sidebar-menu">Order</a>
        </li>
        <li class="list-menu ">
            <div class="icon">
                <ion-icon name="grid"></ion-icon>
            </div>
            <a href="/admin/tipe" class="sidebar-menu">Tipe</a>
        </li>
    </div>
@endsection

@section('content')
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 14px;
        }
    </style>


    <div class="contentMain">
        <center>
            <h1>Admin Page</h1>
        </center>
    </div>
@endsection


@section('js')
@endsection
