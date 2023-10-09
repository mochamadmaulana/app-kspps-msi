<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kantor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KantorCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kantor-cabang.index',[
            'cabang' => Kantor::orderBy('id','DESC')->cabang()->filter(request('search'))->paginate(10)->onEachSide(0)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kantor-cabang.tambah');
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
            return back()->with('error','Gagal menambahkan kantor cabang!')->withErrors($validator)->withInput();
        }
        $kantor = new Kantor();
        $kantor->nama_kantor = strtoupper($request->nama_kantor);
        $kantor->email = $request->email;
        $kantor->no_telepone = $request->no_telepone;
        $kantor->alamat = $request->alamat ?? null;
        $kantor->is_pusat = false;
        $kantor->save();
        return back()->with('success','Berhasil menambahkan kantor cabang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kantor = Kantor::cabang()->findOrFail($id);
        return view('admin.kantor-cabang.edit',compact('kantor'));
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
            return back()->with('error','Gagal mengupdate kantor cabang!')->withErrors($validator)->withInput();
        }
        $kantor = Kantor::cabang()->findOrFail($id);
        $kantor->nama_kantor = strtoupper($request->nama_kantor);
        $kantor->email = $request->email;
        $kantor->no_telepone = $request->no_telepone;
        $kantor->alamat = $request->alamat ?? null;
        $kantor->update();
        return redirect()->route('admin.kantor.cabang.index')->with('success','Berhasil mengupdate kantor cabang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kantor = Kantor::findOrFail($id);
        $kantor->delete();
        return back()->with('success','Berhasil mengupdate kantor cabang');
    }
}
