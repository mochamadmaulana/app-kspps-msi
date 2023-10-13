<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => ['required'],
            'password' => ['required'],
        ]);
        if ($validator->fails()) {
            return back()->with('error','Harap periksa kembali Nik dan Password anda!')->withErrors($validator)->withInput();
        }
        if(is_numeric($request->nik)){
            echo $request->nik . ' Adalah numeric';
        }else{
            $karyawan = Karyawan::with('kota','kantor')->aktif()->where('no_induk_karyawan', $request->nik)->first();
            if (!empty($karyawan) && Hash::check($request->password, $karyawan->password)) {
                if($karyawan->is_aktif == true){
                    // cek role 'Admin', 'Kasie Pembiayaan', 'Kasie Keuangan', 'Staff Lapangan'
                    if ($karyawan->role === 'Admin') {
                        Auth::login($karyawan);
                        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil, Selamat bekerja '.$karyawan->nama_lengkap);
                    }elseif($karyawan->role === 'Kasie Pembiayaan') {
                        Auth::login($karyawan);
                        return redirect()->route('kasie-pembiayaan.dashboard')->with('success', 'Login berhasil, Selamat bekerja '.$karyawan->nama_lengkap);
                    }else{
                        return back()->with('error', 'Login hanya dapat dilakukan oleh Admin dan Kasie Pembiayaan!');
                    }
                }else{
                    return back()->with('error', 'Akun belum aktif, harap hubungi admin!')->withErrors($validator)->withInput();
                }
            } else {
                return back()->with('error', 'Harap periksa kembali Nik dan Password anda!')->withErrors($validator)->withInput();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('nasabah')->logout();
        return redirect()->route('login')->with("success", "Logout berhasil, sampai jumpa kembali..");
    }
}
