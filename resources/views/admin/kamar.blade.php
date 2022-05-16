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

        <li class="list-menu active">
            <div class="icon">
                <ion-icon name="grid"></ion-icon>
            </div>
            <a href="/admin/kamar" class="sidebar-menu">Kamar</a>
        </li>

        <li class="list-menu ">
            <div class="icon">
                <ion-icon name="grid"></ion-icon>
            </div>
            <a href="/admin/fasilitas" class="sidebar-menu">Fasilitas Kamar</a>
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
        <h2 class="pageNameContent">Kamar List</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Kamar List</li>
        </ol>

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Kamar
            </button>
        </div>

        <div class="wrapperTable table-responsive">
            <table id="countryList" class="tables" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Harga</th>
                        <th>Fasilitas</th>
                        <th>Max</th>
                        {{-- <th>Status</th> --}}
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>


                            <td>{{ $item->nama }}</td>
                            <td>{{ DB::table('tipe_kamar')->where('id',$item->tipe_id)->first()->nama }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->fasilitas }}</td>
                            <td>{{ $item->max }}</td>
                            {{-- <td>{{ $item->status }}</td> --}}

                            <td>
                                <div class="buttonAction">
                                    <button type="button" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                        data-bs-target="#updateTanaman" class="buttons success text-white me-2"
                                        data-id="{{ $item->id }}" data-tipe_id="{{ $item->tipe_id }}" data-nama_tipe="{{ DB::table('tipe_kamar')->where('id',$item->tipe_id)->first()->nama }}" data-nama="{{$item->nama}}" data-harga="{{$item->harga}}" data-jumlah_kamar="{{$item->jumlah_kamar}}" data-jumlah_kamar_mandi="{{$item->jumlah_kamar_mandi}}" data-fasilitas="{{$item->fasilitas}}" data-max="{{$item->max}}" data-thumb="{{ url('thumbKamar/').$item->thumb }}">

                                        <img width="20" height="20" src="{{ url('assets/img/create-outline 1.svg') }}"
                                            alt="">
                                    </button>

                                    <a href="{{ route('admin.kamar.delete', ['id' => $item->id]) }}"
                                        class="buttons danger text-white">
                                        <img width="20" height="20" src="{{ url('assets/img/trash-outline 1.svg') }}"
                                            alt="">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Kamar List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.kamar.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="roomType" class="form-label">Room Type</label>
                            <select class="form-select" name="tipe_id" id="roomType">
                                <option value="" selected>Select All Type Room</option>
                                @foreach (DB::table('tipe_kamar')->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="jumlah_kamar">Jumlah Kasur</label>
                            <input type="number" class="form-control" name="jumlah_kamar" id="jumlah_kamar">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="jumlah_kamar_mandi">Jumlah Kamar Mandi</label>
                            <input type="number" class="form-control" name="jumlah_kamar_mandi" id="jumlah_kamar_mandi">
                        </div>

                        <div class="form-group mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas</label>
                            <select class="form-select" id="fasilitas" name="fasilitas">
                                <option value="">Pilih Fasilitas</option>
                                @foreach (
                                    DB::table('fasilitas')->get() as $item
                                )
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="max">Maximal Jumlah Orang</label>
                            <input type="number" class="form-control" name="max" id="max">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="max">Gambar Kamar</label>
                            <input type="file" name="thumb" class="dropify"  />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateTanaman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updateTanamanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div id="modal-content" class="modal-content">
                <div class="modal-body">
                    Loading ...
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#countryList').DataTable({
                "info": false,
                "bSort": false,
            });
        });
    </script>


    <script>
        $('#updateTanaman').on('shown.bs.modal', function(e) {


            var html = `
    <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Kamar List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/kamar/${$(e.relatedTarget).data('id')}/update" method="post">
                @csrf
                <div class="modal-body">


                    <div class="form-group mb-3">
                            <label for="roomType" class="form-label">Room Type</label>

                            <select class="form-select" name="tipe_id" id="roomType">
                                <option value="${$(e.relatedTarget).data('tipe_id')}" selected>${$(e.relatedTarget).data('nama_tipe')}</option>

                                @foreach (DB::table('tipe_kamar')->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="${$(e.relatedTarget).data('nama')}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="${$(e.relatedTarget).data('harga')}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="jumlah_kamar">Jummlah Kamar</label>
                            <input type="number" class="form-control" name="jumlah_kamar" id="jumlah_kamar" value="${$(e.relatedTarget).data('jumlah_kamar')}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="jumlah_kamar_mandi">Jumlah Kamar Mandi</label>
                            <input type="number" class="form-control" name="jumlah_kamar_mandi" id="jumlah_kamar_mandi" value="${$(e.relatedTarget).data('jumlah_kamar_mandi')}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="fasilitas" class="form-label">Fasilitas</label>
                            <textarea class="form-control" id="fasilitas" name="fasilitas" rows="3">${$(e.relatedTarget).data('fasilitas')}</textarea>
                        </div>



                        <div class="form-group mb-3">
                            <label class="form-label" for="max">Max</label>
                            <input type="number" class="form-control" name="max" id="max" value="${$(e.relatedTarget).data('max')}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="max">Thumb</label>
                            <input type="file" name="thumb" class="dropify" data_default_file="${$(e.relatedTarget).data('thumb')}" />
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
`;

            $('#modal-content').html(html);
            $('.dropify').dropify();
        })
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
