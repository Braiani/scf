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
    public function index(Request $request)
    {
        $consulta = [
            'ano' => null,
            'mes' => null,
            'inicio' => true
        ];
        if (isset($request->ano)) {
            $consulta['inicio'] = false;
            $consulta['mes'] = null;
            $consulta['ano'] = $request->ano;
        }
        if (isset($request->mes)) {
            $consulta['inicio'] = false;
            $consulta['mes'] = $request->mes;
            $consulta['ano'] = null;
        }
        return view('home')->with(['consulta' => $consulta]);
    }
    
    public function ano(Request $request)
    {
        return view('mes')->with(['ano' => $request->ano]);
    }

    public function mes(Request $request)
    {
        return view('dia')->with([
            'mes' => $request->mes,
            'ano' => $request->ano
        ]);
    }
}
