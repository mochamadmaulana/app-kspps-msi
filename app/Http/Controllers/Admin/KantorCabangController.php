<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kantor;
use App\Models\Karyawan;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class KantorCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kantor-cabang.index',[
            'all_cabang' => Kantor::cabang()->get(),
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

    public function cek_admin(Request $request)
    {
        $karyawan = Karyawan::with('kantor')->where('kantor_id',$request->kantor_cabang)->where('role','Admin')->first();
        if(!empty($karyawan)){
            return back()->with('error','Admin sudah ada di kantor cabang '.$karyawan->kantor->nama_kantor);
        }else{
            return redirect()->route('admin.kantor.cabang.admin-create',$request->kantor_cabang);
        }
    }

    public function admin_create(string $id)
    {
        return view('admin.kantor-cabang.tambah-admin',[
            'kota' => Kota::orderBy('nama_kota')->get(),
            'cabang' => Kantor::cabang()->findOrFail($id)
        ]);
    }

    public function admin_store(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "nama_lengkap" => ["required"],
            "email" => ["nullable","max:200","unique:karyawan,email,".$id.",id"],
            "no_telepone" => ["required","max:200","unique:karyawan,no_telepone"],
            "tempat_lahir" => ["required"],
            "tanggal_lahir" => ["required"],
            "password" => ["required","min:6"],
            "konfirmasi_password" => ["required_with:password","same:password"],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal menambahkan admin!')->withErrors($validator)->withInput();
        }
        $last_row = Karyawan::where('kantor_id',$id)->orderBy('id','DESC')->first();
        $kantor = Kantor::findOrFail($id);
        if(!empty($last_row)){
            $no_urut = substr($last_row->no_induk_karyawan,-3,3) + 1;
            $no_induk = "MSI" . $id . str_pad($no_urut, 3, "0", STR_PAD_LEFT);
        }else{
            $no_induk = "MSI" . $id . str_pad(1, 3, "0", STR_PAD_LEFT);
        }
        $karyawan = Karyawan::create([
            "no_induk_karyawan" => $no_induk,
            "nama_lengkap" => $request->nama_lengkap,
            "no_telepone" => $request->no_telepone,
            "email" => $request->email ?? null,
            "password" => Hash::make($request->password),
            "kota_id" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "role" => 'Admin',
            "kantor_id" => $id,
        ]);
        return redirect()->route('admin.kantor.cabang.index')->with(
            ['success'=>'Berhasil menambahkan admin kantor cabang '.$kantor->nama_kantor,
            'nama_kantor' => $kantor->nama_kantor,
            'nik_karyawan'=>$karyawan->no_induk_karyawan,
            'nama_karyawan'=> $karyawan->nama_lengkap
        ]);
    }
}
