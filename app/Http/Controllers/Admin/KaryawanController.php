<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kantor;
use App\Models\Karyawan;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.karyawan.index',[
            'karyawan' => Karyawan::where('kantor_id',Auth::user()->kantor_id)->latest('id')->search(request('search'))->paginate(10)->onEachSide(0)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kota = Kota::with('provinsi')->orderBy('nama_kota','ASC')->get();
        return view('admin.karyawan.tambah',compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nama_lengkap" => ["required"],
            "email" => ["nullable","max:200","unique:karyawan,email"],
            "no_telepone" => ["required","max:200","unique:karyawan,no_telepone"],
            "tempat_lahir" => ["required"],
            "tanggal_lahir" => ["required"],
            "role" => ["required"],
            "password" => ["required","min:6"],
            "konfirmasi_password" => ["required_with:password","same:password"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal menambahkan karyawan!')->withErrors($validator)->withInput();
        }
        $last_row = Karyawan::where('kantor_id',Auth::user()->kantor_id)->orderBy('id','DESC')->first();
        if(!empty($last_row)){
            $no_urut = substr($last_row->no_induk_karyawan,-3,3) + 1;
            $no_induk = "MSI" . Auth::user()->kantor_id . str_pad($no_urut, 3, "0", STR_PAD_LEFT);
        }else{
            $no_induk = "MSI" . Auth::user()->kantor_id . str_pad(1, 3, "0", STR_PAD_LEFT);
        }
        Karyawan::create([
            "no_induk_karyawan" => $no_induk,
            "nama_lengkap" => $request->nama_lengkap,
            "no_telepone" => $request->no_telepone,
            "email" => $request->email ?? null,
            "password" => Hash::make($request->password),
            "kota_id" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "role" => $request->role,
            "kantor_id" => Auth::user()->kantor_id,
        ]);
        return back()->with('success','Berhasil menambahkan karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $karyawan = Karyawan::with('kantor','kota')->findOrFail($id);
        return view('admin.karyawan.detail',compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $kota = Kota::with('provinsi')->orderBy('nama_kota','ASC')->get();
        return view('admin.karyawan.edit',compact('karyawan','kota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "nama_lengkap" => ["required"],
            "email" => ["nullable","max:200","unique:karyawan,email,".$id.",id"],
            "no_telepone" => ["required","max:200","unique:karyawan,no_telepone,".$id.",id"],
            "tempat_lahir" => ["required"],
            "tanggal_lahir" => ["required"],
            "role" => ["required"],
            // "password" => ["required","min:6"],
            // "konfirmasi_password" => ["required_with:password","same:password"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengupdate karyawan!')->withErrors($validator)->withInput();
        }
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            "nama_lengkap" => $request->nama_lengkap,
            "no_telepone" => $request->no_telepone,
            "email" => $request->email ?? null,
            "kota_id" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "role" => $request->role,
            "is_aktif" => $request->status,
        ]);
        return redirect()->route('admin.karyawan.index')->with('success','Berhasil mengupdate karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return back()->with('success','Berhasil menghapus karyawan');
    }

    public function edit_password(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "password" => ["required","min:6"],
            "konfirmasi_password" => ["required_with:password","same:password"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal mengupdate password!')->withErrors($validator)->withInput();
        }
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('success','Berhasil mengupdate password');
    }
}
