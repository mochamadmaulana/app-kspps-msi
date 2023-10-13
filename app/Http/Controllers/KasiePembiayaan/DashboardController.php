<?php

namespace App\Http\Controllers\KasiePembiayaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('layouts.kasie_pembiayaan');
    }
}
