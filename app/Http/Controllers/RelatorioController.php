<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Despesa;
use App\Charts\DespesasAnuais;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function index()
    {
        $labels = [];
        $data = [];

        for ($i=0; $i < 5; $i++) {
            $anoBusca = Carbon::now()->subYear($i)->format('Y');
            $query = new Despesa;
            $total = $query->whereYear('data', $anoBusca)->sum('valor');
            
            array_push($labels, $anoBusca);
            array_push($data, $total);
        }

        $chart = new DespesasAnuais;
        
        $chart->labels($labels);
        $chart->dataset('R$ por ano', 'bar', $data)->options([
            'borderWidth' => 5,
            'backgroundColor' => [
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
                '#' . substr(md5(rand()), 0, 6),
            ],
        ]);
        
        return view('despesas.graficos')->with(['chart' => $chart]);
    }
}
