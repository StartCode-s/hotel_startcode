<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order,Kamar,User};
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ReceptionController extends Controller
{
    public function index(Request $request)
    {
        return view('reception.index');
    }

    public function search()
    {

        $checkInQr = QrCode::size(400)->generate(env('APP_URL').'/reception/checkIn/'.'HT-STR'.$_GET['order_code']);
        $checkOutQr = QrCode::size(400)->generate(env('APP_URL').'/reception/checkOut/'.'HT-STR'.$_GET['order_code']);
        return view('reception.search',[
            'data' => Order::where('order_code','HT-STR'.$_GET['order_code'])->first(),
            'checkInQr' => $checkInQr,
            'checkOutQr' => $checkOutQr,
            'checkin_code' => env('APP_URL').'/reception/checkIn/'.'HT-STR'.$_GET['order_code'],
            'checkout_code' => env('APP_URL').'/reception/checkOut/'.'HT-STR'.$_GET['order_code'],
        ]);
    }

    public function checkIn(Request $request,$code)
    {
        $order = Order::where('order_code',$code)->first();
        $order->is_check_in = TRUE;
        $order->save();
        dd('Sukses Check In');
    }
    public function checkOut(Request $request,$code)
    {
        $order = Order::where('order_code',$code)->first();
        $order->is_check_out = TRUE;
        $order->save();
        dd('Sukses Check Out');
    }

}
