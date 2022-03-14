<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class OurHistoryController extends Controller
{
    public function index(Request $request)
    {
        return view('vistas.ourhistory.index');
    }
}
