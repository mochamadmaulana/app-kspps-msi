<?php

namespace App\Http\Controllers\KasiePembiayaan;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\JenisUsaha;
use App\Models\Kota;
use App\Models\Majlis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            "nama_lengkap" => ["required"],
            "jenis_identitas" => ["required"],
            "no_identitas" => ["required","numeric","unique:anggota,no_identitas"],
            "no_telepone" => ["required","max:15"],
            "tempat_lahir" => ["required"],
            "tanggal_lahir" => ["required"],
            "jenis_kelamin" => ["required"],
            "pendidikan_terakhir" => ["required"],
            "agama" => ["required"],
            "status_pernikahan" => ["required"],
            "majlis" => ["required"],
            "alamat" => ["required"],
            "nama_ibu_kandung" => ["required"],
            "jenis_usaha" => ["required"],
            "foto_identitas" => ["required","file","mimes:png,jpg,jpeg","max:1024"],
            'foto_kk' => ['required','file','mimes:png,jpg,jpeg','max:1024'],
            'bukti_bayar_pendaftaran' => ['required','file','mimes:png,jpg,jpeg','max:1024'],
            'foto_usaha' => ['required','file','mimes:png,jpg,jpeg','max:1024'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal menambahkan anggota!')->withErrors($validator)->withInput();
        }
        $kantor_id = Auth::user()->kantor_id;
        $last_row = Anggota::where('kantor_id',$kantor_id)->orderBy('id','DESC')->first();
        if(!empty($last_row)){
            $no_urut = substr($last_row->no_pendaftaran,-3,3) + 1;
            $no_pendaftaran = date('ymd',time()).$kantor_id.str_pad($no_urut, 3, "0", STR_PAD_LEFT);
        }else{
            $no_pendaftaran = date('ymd',time()).$kantor_id.str_pad(1, 3, "0", STR_PAD_LEFT);
        }
        if($request->has('foto_identitas') && $request->file('foto_kk') && $request->file('foto_usaha') && $request->file('bukti_bayar_pendaftaran')){
            $foto_identitas = $request->file('foto_identitas');
            $foto_kk = $request->file('foto_kk');
            $foto_usaha = $request->file('foto_usaha');
            $bukti_bayar_pendaftaran = $request->file('bukti_bayar_pendaftaran');

            $hash_name_foto_identitas = $no_pendaftaran .'/'. $foto_identitas->hashName();
            $hash_name_foto_kk = $no_pendaftaran .'/'. $foto_kk->hashName();
            $hash_name_foto_usaha = $no_pendaftaran .'/'. $foto_usaha->hashName();
            $hash_name_bukti_bayar_pendaftaran = $no_pendaftaran .'/'. $bukti_bayar_pendaftaran->hashName();

            $foto_identitas->storeAs('public/image/',$hash_name_foto_identitas);
            $foto_kk->storeAs('public/image/',$hash_name_foto_kk);
            $foto_usaha->storeAs('public/image/',$hash_name_foto_usaha);
            $bukti_bayar_pendaftaran->storeAs('public/image/',$hash_name_bukti_bayar_pendaftaran);

            Anggota::create([
                "no_pendaftaran" => $no_pendaftaran,
                "nama_lengkap" => $request->nama_lengkap,
                "jenis_identitas" => $request->jenis_identitas,
                "no_identitas" => $request->no_identitas,
                "no_telepone" => $request->no_telepone,
                "tempat_lahir_id" => $request->tempat_lahir,
                "jenis_usaha_id" => $request->jenis_usaha,
                "tanggal_lahir" => $request->tanggal_lahir,
                "jenis_kelamin" => $request->jenis_kelamin,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "agama" => $request->agama,
                "status_pernikahan" => $request->status_pernikahan,
                "majlis_id" => $request->majlis,
                "alamat" => $request->alamat,
                "kantor_id" => $kantor_id,
                "nama_ibu_kandung" => $request->nama_ibu_kandung,
                "foto_identitas" => $hash_name_foto_identitas,
                "foto_kk" => $hash_name_foto_kk,
                "foto_usaha" => $hash_name_foto_usaha,
                "bukti_bayar_pendaftaran" => $hash_name_bukti_bayar_pendaftaran,
                "id_penginput" => Auth::user()->id,
            ]);
            return back()->with('success','Berhasil menambahkan anggota');
        }else{
            return back()->with('error','Gagal menambahkan anggota')->withErrors($validator)->withInput();
        }
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
