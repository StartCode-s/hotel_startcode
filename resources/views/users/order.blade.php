@extends('layouts.base-user')


@section('css')
    <link rel="stylesheet" href="{{ url('assets-user/css/search-typeroom.css') }}">
@endsection

@section('content')



    <div class="main-content explore-typeroom">
        <div class="banner-images">
            <img src="{{ url('assets-user/images/mockup-search-room.jpg') }}" alt="">
        </div>



        <div class="container-fluid result-search mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <form action="{{ route('order') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-input">
                                        <label for="checkin" class="form-label">Check-in</label>
                                        <input type="date" name="check_in" id="checkin" min="{{ date('Y-m-d') }}"
                                            class="form-control" onchange="updatedate();" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input">
                                        <label for="checkout" class="form-label">Check-out</label>
                                        <input type="date" name="check_out" id="checkout" min="{{ date('Y-m-d') }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input">
                                        <label for="roomType" class="form-label">Room Type</label>
                                        <select class="form-select" name="tipe_id" id="roomType">
                                            <option value="" selected>Select All Type Room</option>
                                            @foreach (DB::table('tipe_kamar')->get() as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input">
                                        <label for="valueAdult" class="form-label">Adult</label>
                                        <select class="form-select" name="adult" id="valueAdult">
                                            <option value="" selected>Select Count</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input">
                                        <label for="childvalue" class="form-label">Children</label>
                                        <select class="form-select" name="childreen" id="childvalue">
                                            <option value="" selected>Select Count</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <button class="button button-primary w-100">Search Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        @if ($data->count()==0)
                        <div class="col-12">
                            <!--not find result-->
                            <div class="not-find-result d-flex flex-column justify-content-center align-items-center w-100">
                                <img class="mb-3" src="{{ url('assets-user/images/not-find.png') }}" alt="">
                                <h5>Not Find Result</h5>
                            </div>
                        </div>
                        @else
                            @foreach ($data as $item)
                                <div class="col-4">
                                    <div class="card card-items">
                                        <div class="image-room">
                                            <img src="{{ url('thumbkamar/' . $item->thumb) }}" alt="">
                                        </div>
                                        <div class="detail-room">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="name-room">{{ $item->nama }}</h5>
                                            </div>
                                            <div class="d-flex price">
                                                <p class="price-room">Rp {{ $item->harga }}</p>
                                                <p>/Night</p>
                                            </div>
                                        </div>
                                        @if (DB::table('order')->where('kamar_id', $item->id)->where('check_in', '>=', $all['check_in'])->where('check_out', '<=', $all['check_out'])->where('status','>',0)->exists())
                                            <button class="button button-danger button-small mt-3" disabled>Non
                                                Available</button>
                                        @else
                                            <form action="{{ route('checkout') }}" class="ord" method="post">
                                                @csrf
                                                <input type="hidden" name="room" value="{{ $item->id }}">
                                                <button type="submit"
                                                    class="button button-primary button-small mt-3 w-100">Book
                                                    Hotel</button>
                                            </form>
                                        @endif
                                        <button type="button" class="detail-room-button" data-bs-toggle="modal" data-bs-target="#modal-detail-room" data-bs-target="#staticBackdrop" data-id="{{$item->id}}" data-tipe_id="{{$item->tipe_id}}" data-nama="{{$item->nama}}" data-harga="{{$item->harga}}" data-jumlah_kamar="{{$item->jumlah_kamar}}" data-jumlah_kamar_mandi="{{$item->jumlah_kamar_mandi}}" data-fasilitas="{{$item->fasilitas}}" data-max="{{$item->max}}" data-status="{{$item->status}}" data-thumb="{{ url('thumbkamar/' . $item->thumb) }}">
                                            Detail Room
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade detail-room" id="modal-detail-room" tabindex="-1" aria-labelledby="detail-Room" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal-content">
            <div class="modal-body">
                loading...
            </div>
          </div>
        </div>
    </div>
@endsection


@section('js')



    <script>
        $('#modal-detail-room').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="detail-room-wrapper">
                    <div class="images-room d-flex justify-content-center">
                        <img src="${$(e.relatedTarget).data('thumb')}" alt="">
                    </div>
                    <h1 class="name-room">${$(e.relatedTarget).data('nama')}</h1>
                    <p class="alamat">JL Pisang mas 4 blok c2 nomor 1 Kab Bogor Kecamatan Sumur Batu</p>

                    <div class="wrapper-tabs">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-deskripsi-tab" data-bs-toggle="tab" data-bs-target="#nav-deskripsi" type="button" role="tab" aria-controls="nav-deskripsi" aria-selected="true">Description</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-deskripsi" role="tabpanel" aria-labelledby="nav-deskripsi-tab" tabindex="0">The startcode hotel provides the best experience in each of your lodgings, provides the best service and also has very complete facilities</div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                                Call Center : +6281290053372
                            </div>
                        </div>
                    </div>


                    <div class="room-features">
                        <h5>Room Features</h5>
                        <div class="wrapper-room-features">
                            <div class="feature d-flex align-items-center">
                                <div class="icon">
                                    <ion-icon name="wifi-outline"></ion-icon>
                                </div>
                                <p>Wi-Fi</p>
                            </div>
                            <div class="feature d-flex align-items-center">
                                <div class="icon">
                                    <ion-icon name="bed-outline"></ion-icon>
                                </div>
                                <p>King Bed</p>
                            </div>
                            <div class="feature d-flex align-items-center">
                                <div class="icon">
                                    <ion-icon name="thermometer-outline"></ion-icon>
                                </div>
                                <p>AC</p>
                            </div>
                            <div class="feature d-flex align-items-center">
                                <div class="icon">
                                    <ion-icon name="fast-food-outline"></ion-icon>
                                </div>
                                <p>Breakfast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    `;
            $('#modal-content').html(html);

        })
    </script>
    <script>
        $(".ord").on('submit', function() {
            console.log(@json($all));
            var input = $("<input>").attr({
                "type": "hidden",
                "name": "req"
            }).val(JSON.stringify(@json($all)));

            $(this).append(input);
            return true;
        });
    </script>
    <script>
        function padTo2Digits(num) {
            return num.toString().padStart(2, '0');
        }

        function formatDate(date) {
            return [
                date.getFullYear(),
                padTo2Digits(date.getMonth() + 1),
                padTo2Digits(date.getDate()),
            ].join('-');

        }

        function updatedate() {
            var firstdate = document.getElementById("checkin").value;
            document.getElementById("checkout").value = "";
            // Create new Date instance
            var date = new Date(firstdate);

            // Add a day
            date.setDate(date.getDate() + 1);

            console.log(formatDate(date));
            document.getElementById("checkout").setAttribute("min", formatDate(date));
        }
    </script>
@endsection
