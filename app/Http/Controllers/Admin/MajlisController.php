<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Majlis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MajlisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majelis = Majlis::where('kantor_id',Auth::user()->kantor_id)->orderBy('id','DESC')->filter(request('search'))->paginate(10)->onEachSide(0)->withQueryString();
        return view('admin.majlis.index',compact('majelis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majlis.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_majlis" => ["required",'max:150'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal menambahkan majlis!')->withErrors($validator)->withInput();
        }
        Majlis::create([
            'kantor_id' => Auth::user()->kantor_id,
            'nama_majlis' => $request->nama_majlis
        ]);
        return back()->with('success','Berhasil menambahkan majlis');
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
        $majlis = Majlis::findOrFail($id);
        return view('admin.majlis.edit',compact('majlis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "nama_majlis" => ["required",'max:150'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengupdate majlis!')->withErrors($validator)->withInput();
        }
        Majlis::findOrFail($id)->update([
            'nama_majlis' => $request->nama_majlis
        ]);
        return redirect()->route('admin.majlis.index')->with('success','Berhasil mengupdate majlis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $majlis = Majlis::findOrFail($id);
        if($majlis->count()){
            $majlis->delete();
            return back()->with('success','Berhasil menghapus majlis');
        }else{
            return back()->with('error','Gagal menghapus majlis!');
        }
    }
}
