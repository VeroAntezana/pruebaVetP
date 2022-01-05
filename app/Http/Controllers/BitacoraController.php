<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\bitacora;

class BitacoraController extends Controller
{
    public function index(){
        $bitacora = bitacora::all();
        return view('bitacora.index', compact('bitacora'));
    }
}
