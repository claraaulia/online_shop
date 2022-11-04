<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaContoller extends Controller
{
    public Function index()
    {
        return view('coba', ['nama' => 'clara']);
    }
}
