<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KantorPusatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kantor-pusat.index',[
            'pusat' => Kantor::pusat()->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_kantor" => ["required"],
            "email" => ["required","email","unique:kantor,email"],
            "no_telepone" => ["required","numeric","unique:kantor,no_telepone"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mendefinisikan kantor pusat!')->withErrors($validator)->withInput();
        }
        $kantor = new Kantor();
        $kantor->nama_kantor = strtoupper($request->nama_kantor);
        $kantor->email = $request->email;
        $kantor->no_telepone = $request->no_telepone;
        $kantor->alamat = $request->alamat ?? null;
        $kantor->is_pusat = true;
        $kantor->save();
        return back()->with('success','Berhasil mendefinisikan kantor pusat');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "nama_kantor" => ["required"],
            "email" => ["required","email","unique:kantor,email,".$id.",id"],
            "no_telepone" => ["required","numeric","unique:kantor,no_telepone,".$id.",id"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengupdate kantor pusat!')->withErrors($validator)->withInput();
        }
        $kantor = Kantor::pusat()->findOrFail($id);
        $kantor->nama_kantor = strtoupper($request->nama_kantor);
        $kantor->email = $request->email;
        $kantor->no_telepone = $request->no_telepone;
        $kantor->alamat = $request->alamat ?? null;
        $kantor->update();
        return back()->with('success','Berhasil mengupdate kantor pusat');
    }

}
