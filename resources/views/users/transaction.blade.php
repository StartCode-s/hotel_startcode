@extends('layouts.base-user')


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ url('assets-user/css/history-transaksi.css') }}">
@endsection

@section('content')
    <div class="main-content mt-5">
        <div class="container ">
            <h1 class="title">History Transaksi</h1>
            <div class="wrapperTable table-responsive">
                <table id="lasRequest" class="tables" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Booking</th>
                            <th>Payment Methode</th>
                            <th>Type Hotel</th>
                            <th>Guest Name</th>
                            <th>Date Transaction</th>
                            <th>Status</th>
                            <th>Invoice</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach (DB::table('order')->where('user_id', Auth::id())->get()
        as $key=> $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><span class="status success-status">{{ $item->order_code }}</span></td>
                                <td>{{ Str::upper($item->payment_method) }}</td>
                                <td>{{ DB::table('kamar')->where('id', $item->kamar_id)->first()->nama }}</td>
                                <td>{{ $item->guest_name }}</td>
                                <td>{{ $item->transaction_time }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="alerts pending-alerts">Waiting Paid</span>
                                    @elseif(Date::now()->format('Y-m-d') > $item->check_out && $item->status == 0)
                                        <span class="alerts danger-alerts">Canceled</span>
                                    @elseif($item->is_check_out)
                                        <span class="alerts success-alerts">Check-out</span>
                                    @elseif($item->is_check_in)
                                        <span class="alerts primary-alerts">Check-in</span>
                                    @elseif($item->status == -1)
                                        <span class="alerts danger-alerts">Canceled</span>
                                        @elseif($item->status == -2)
                                        <span class="alerts danger-alerts">Failed / Error</span>
                                    @elseif (Date::now()->format('Y-m-d') >= $item->check_in && Date::now()->format('Y-m-d') <= $item->check_out)
                                        <span class="alerts primary-alerts">Check-in</span>
                                    @elseif(Date::now()->format('Y-m-d') < $item->check_in)
                                        <span class="alerts pending-alerts">Waiting Check-in</span>
                                    @elseif(Date::now()->format('Y-m-d') > $item->check_out)
                                        <span class="alerts success-alerts">Success</span>
                                    @endif

                                </td>
                                @if ($item->status >= 0)
                                    <td>
                                        @if (is_null($item->transaction_id))
                                            <a href="{{ route('pay', ['code' => $item->order_code]) }}" type="submit"
                                                class="button button-small button-success w-100 d-block text-center"> Pay</a>
                                        @else
                                            <a class="button button-small button-primary w-100 d-block text-center"
                                                href="{{ route('transaction-invoice', ['code' => $item->order_code]) }}">Invoice</a>
                                        @endif
                                    </td>
                                @endif

                                @if ($item->status == 0)
                                    <td>
                                        <a href="{{ route('cancel-order', ['code' => $item->id]) }}"
                                            class="button button-danger button-small">Cancel</a>
                                    </td>
                                    @else
                                @endif
                                    <td></td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <!--Datatable By Bootstrap-->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#lasRequest').DataTable({
                "bInfo": false,
            });
        });
    </script>
@endsection
