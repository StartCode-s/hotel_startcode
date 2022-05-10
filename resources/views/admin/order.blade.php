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


    </div>
@endsection

@section('content')
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
                        <th>User Id</th>
                        <th>Guest Name</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Kamar ID</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>


                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->guest_name }}</td>
                            <td>{{ $item->check_in }}</td>
                            <td>{{ $item->check_out }}</td>
                            <td>{{ DB::table('kamar')->where('id', $item->kamar_id)->first()->tipe }}</td>
                            <td>{{ $item->status }}</td>

                            <td>
                                <div class="buttonAction">
                                    <button type="button" data-id="{{ $item->id }}" data-bs-toggle="modal"
                                        data-bs-target="#updateTanaman" class="buttons success text-white me-2"
                                        data-tipe="{{ $item->tipe }}">

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
                <form action="{{ route('admin.kamar.store') }}" method="post">
                    @csrf
                    <div class="modal-body">


                        <div class="form-group mb-3">
                            <label class="form-label" for="tipe">Tipe</label>
                            <input type="text" class="form-control" name="tipe" id="tipe">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="harga">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="max">Max</label>
                            <input type="text" class="form-control" name="max" id="max">
                        </div>


                        <div class="form-group mb-3">
                            <label class="form-label" for="status">Status</label>
                            <input type="text" class="form-control" name="status" id="status">
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
            <form action="/admin/editKamar/${$(e.relatedTarget).data('id')}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label class="form-label" for="Count / QTY">Count / QTY</label>
                        <input type="number" class="form-control" name="count" id="count" value="${$(e.relatedTarget).data('count')}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="Value">Value</label>
                        <input type="number" class="form-control" name="value" value="${$(e.relatedTarget).data('value')}" id="value" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
`;

            $('#modal-content').html(html);

        })
    </script>
@endsection
