@extends('layouts.base')



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
    <center><h1>Dashboard Admin</h1></center>
@endsection
