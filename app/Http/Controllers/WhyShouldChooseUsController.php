<?php

namespace sisVentasWeb\Http\Controllers;

use Illuminate\Http\Request;

class WhyShouldChooseUsController extends Controller
{
    public function index(Request $request)
    {
        return view('vistas.whyshouldchooseus.index');
    }
}
