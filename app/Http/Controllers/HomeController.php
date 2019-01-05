<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function ano(Request $request, $ano)
    {
        return view('mes')->with(['ano' => $ano]);
    }

    public function mes(Request $request, $ano, $mes)
    {
        return view('dia')->with([
            'mes' => $mes,
            'ano' => $ano
        ]);
    }
}
