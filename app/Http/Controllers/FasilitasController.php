<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitas', [
            'data' => Fasilitas::all()
        ]);
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
            'name' => 'required',
            'desc' => 'required'
        ]);
            Fasilitas::create([
                'name' => $request->name,
                'desc' => $request->desc,
            ]);

        return redirect()->route('admin.fasilitas.index')->with(['message'=>'Fasilitas berhasil di tambah !','status'=>'success']);
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
        Fasilitas::where('id', $id)
        ->update([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.fasilitas.index')->with(['message'=>'Fasilitas Berhasil di Update!','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Fasilitas::destroy($id);
        return redirect()->route('admin.fasilitas.index')->with(['message'=>'Fasilitas Berhasil di delete','status'=>'danger']);
    }
}
