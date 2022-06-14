<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepalaController extends Controller
{
    public function index()
    {
        return view('kepala.index');
    }
}
