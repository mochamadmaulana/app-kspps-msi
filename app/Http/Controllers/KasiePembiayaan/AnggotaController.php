<?php

namespace App\Http\Controllers\KasiePembiayaan;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\JenisUsaha;
use App\Models\Kota;
use App\Models\Majlis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::with('kota','jenis_usaha','majlis','penginput')->where('kantor_id',Auth::user()->kantor_id)->orderBy('id','DESC')->paginate(10)->onEachSide(0)->withQueryString();
        return view('kasie-pembiayaan.anggota.index', [
            'anggota' => $anggota
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kota = Kota::orderBy('nama_kota','ASC')->get();
        $majlis = Majlis::where('kantor_id',Auth::user()->kantor_id)->get();
        $jenis_usaha = JenisUsaha::all();
        return view('kasie-pembiayaan.anggota.tambah',[
            'kota' => $kota,
            'majlis' => $majlis,
            'jenis_usaha' => $jenis_usaha,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = Anggota::with('kota','jenis_usaha','majlis','penginput','catatan_pendaftaran_ditolak')->where('kantor_id',Auth::user()->kantor_id)->findOrFail($id);
        return view('kasie-pembiayaan.anggota.detail',[
            'anggota' => $anggota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
