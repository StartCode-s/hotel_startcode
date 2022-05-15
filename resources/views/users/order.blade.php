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
                        @if (is_null($data) || empty($data))
                        @else
                            @foreach ($data as $item)
                                <div class="col-4">
                                    <a href="#" class="card card-items">
                                        <div class="image-room">
                                            <img src="{{ url('thumbkamar/' . $item->thumb) }}" alt="">
                                        </div>
                                        <div class="detail-room">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="name-room">{{ $item->nama }}</h5>
                                                <div class="rating">
                                                    <ion-icon name="star"></ion-icon>
                                                    {{ $item->rate }}
                                                </div>
                                            </div>
                                            <div class="d-flex price">
                                                <p class="price-room">{{ $item->harga }}</p>
                                                <p>/Night</p>
                                            </div>
                                        </div>
                                        @if (DB::table('order')->where('kamar_id', $item->id)->where('check_in', '>=', $all['check_in'])->where('check_out', '<=', $all['check_out'])->exists())
                                            <button class="button btn-danger button-small mt-3" disabled>Non
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
                                        <button class="button btn-info button-small mt-3" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop" data-id="{{$item->id}}" data-tipe_id="{{$item->tipe_id}}" data-nama="{{$item->nama}}" data-harga="{{$item->harga}}" data-jumlah_kamar="{{$item->jumlah_kamar}}" data-jumlah_kamar_mandi="{{$item->jumlah_kamar_mandi}}" data-fasilitas="{{$item->fasilitas}}" data-max="{{$item->max}}" data-status="{{$item->status}}" data-thumb="{{$item->thumb}}">Detail Room</button>
                                    </a>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
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
