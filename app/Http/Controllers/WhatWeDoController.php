<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class WhatWeDoController extends Controller
{
    public function index(Request $request)
    {
        return view('vistas.whatwedo.index');
    }
}
