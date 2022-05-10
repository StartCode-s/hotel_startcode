<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.order', [
            'data' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kamar.create-or-edit',['act'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'guest_name' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'total' =>'required',
            'kamar_id' => 'required',
            'status' => 'required',
        ]);


        Order::create([
            'user_id' => $request->user_id,
            'guest_name' => $request->guest_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total' => $request->total,
            'kamar_id' => $request->kamar_id,
            'status' => $request->status,
        ]);

        return redirect()->route('kamar.index')->with(['message'=>'Order berhasil di tambah !','status'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = kamar::find($id);
        return view('kamar.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = kamar::find($id);
        return view('kamar.create-or-edit', [
            'data' => $data,
            'act' => 'edit'
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Order::where('id', $id)
        ->update([
            'user_id' => $request->user_id,
            'guest_name' => $request->guest_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total' => $request->total,
            'kamar_id' => $request->kamar_id,
            'status' => $request->status,
        ]);

        return redirect()->route('kamar.index')->with(['message'=>'Order Berhasil di Update!','status'=>'warning']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        kamar::destroy($id);
        return redirect()->route('kamar.index')->with(['message'=>'kAMAR Berhasil di delete','status'=>'danger']);
    }
}
