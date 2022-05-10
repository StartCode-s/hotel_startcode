<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kamar', [
            'data' => Kamar::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kamar',['act'=>'create']);
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
            'tipe_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'jumlah_kamar' =>'required',
            'jumlah_kamar_mandi' =>'required',
            'fasilitas' =>'required',
            'max' =>'required',

        ]);


        if ($request->hasFile('thumb')) {
            $file = $request->file('thumb');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/thumbkamar' . '/', $thumbname);

        Kamar::create([
            'tipe_id' => $request->tipe_id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah_kamar' => $request->jumlah_kamar,
            'jumlah_kamar_mandi' => $request->jumlah_kamar_mandi,
            'fasilitas' => $request->fasilitas,
            'max' => $request->max,

            'thumb' => $thumbname,
        ]);
        }else {
            Kamar::create([
                'tipe_id' => $request->tipe_id,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'jumlah_kamar' => $request->jumlah_kamar,
                'jumlah_kamar_mandi' => $request->jumlah_kamar_mandi,
                'fasilitas' => $request->fasilitas,

                'max' => $request->max,
            ]);
        }


        return redirect()->route('admin.kamar.index')->with(['message'=>'Kamar berhasil di tambah !','status'=>'success']);
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
        return view('admin.kamar', [
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

        if ($request->hasFile('thumb')) {
            $file = $request->file('thumb');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/thumbkamar' . '/', $thumbname);


        Kamar::where('id', $id)
        ->update([
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'fasilitas' => $request->fasilitas,
            'max' => $request->max,
            'status' => $request->status,
            'thumb' => $thumbname,
        ]);

        }else {

            Kamar::where('id', $id)
            ->update([
                'tipe' => $request->tipe,
                'harga' => $request->harga,
                'fasilitas' => $request->fasilitas,
                'max' => $request->max,
                'status' => $request->status,
            ]);

        }


        return redirect()->route('admin.kamar.index')->with(['message'=>'Kamar Berhasil di Update!','status'=>'warning']);
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
        return redirect()->route('admin.kamar.index')->with(['message'=>'Kamar Berhasil di delete','status'=>'danger']);
    }
}
