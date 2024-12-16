<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function quienesSomos()
    {
        return view('quienes_somos');
    }

    public function contacto()
    {
        return view('contacto');
    }
}
