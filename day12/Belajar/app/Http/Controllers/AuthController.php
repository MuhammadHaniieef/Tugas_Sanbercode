<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function daftar()
    {
        return view ('form');
    }
    public function welcome(Request $request)
    {
        $namaDepan = $request->input('fsname');
        $namaBelakang = $request->input('lsname');
        return view ('welcome', ['namaDepan' =>$namaDepan, 'namaBelakang' =>$namaBelakang]);
    }
}
