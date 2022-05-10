<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kamar.index', [
            'kamar' => Kamar::all()
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
            'tipe' => 'required',
            'harga' => 'required',
            'fasilitas' => 'required',
            'max' => 'required',
            'thumb' => 'required',
        ]);


    $file = $request->file('gambar');
    $thumbname = time() . '-' . $file->getClientOriginalName();
    $file->move(public_path() . '/thumbkamar' . '/', $thumbname);

        Kamar::create([
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'fasilitas' => $request->fasilitas,
            'max' => $request->max,
            'thumb' => $request->thumb,
        ]);

        return redirect()->route('kamar.index')->with(['message'=>'Kamar berhasil di tambah !','status'=>'success']);
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
            'thumb' => $thumbname,
        ]);

        }else {

            Kamar::where('id', $id)
            ->update([
                'tipe' => $request->tipe,
                'harga' => $request->harga,
                'fasilitas' => $request->fasilitas,
                'max' => $request->max,
            ]);

        }


        return redirect()->route('kamar.index')->with(['message'=>'Kamar Berhasil di Update!','status'=>'warning']);
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
