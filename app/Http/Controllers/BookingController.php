<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function room(Request $request)
    {
        Kamar::all();
        return view('booking.room', [
            'data' => Kamar::all()
        ]);
    }

    public function order(Request $request)
    {
        Order::create([
            'user_id' => $request->user_id,
            'guest_name' => $request->guest_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total' => $request->total,
            'kamar_id' => $request->kamar_id,
            'status' => $request->status,
        ]);

        return redirect()->back()->with(['message'=>'Order berhasil ditambahkan','status'=>'success']);
    }
}
