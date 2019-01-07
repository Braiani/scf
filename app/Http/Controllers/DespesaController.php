<?php

namespace App\Http\Controllers;

use App\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $ano, $mes)
    {
        $query = Despesa::whereYear('data', $ano)->whereMonth('data', $mes + 1);
        $total = $query->sum('valor');
        $despesas = $query->get();
        return view('despesas')->with([
            'ano' => $ano,
            'mes' => $mes,
            'despesas' => $despesas,
            'total' => $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $data)
    {
        return view('despesas.add')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data.*' => 'required|date|after:2013-01-01',
            'descricao.*' => 'required',
            'valor.*' => 'required'
        ]);
        
        foreach ($validated['data'] as $key => $valor) {
            $despesa = Despesa::create([
                'data' => $valor,
                'descricao' => $validated['descricao'][$key],
                'valor' => number_format($validated['valor'][$key], 2, '.', '')
            ]);
        }
        $request->session()->flash('sucesso', 'Despesa(s) salva com sucesso!');
        return redirect()->route('consulta.despesa', [
            'ano' => $despesa->data->format('Y'),
            'mes' => $despesa->data->format('n') - 1
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit($despesa)
    {
        $despesas = Despesa::whereDate('data', $despesa)->get();

        return view('despesas.edit')->with([
            'despesas' => $despesas,
            'data' => $despesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $despesa)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Despesa $despesa)
    {
        $ano = $despesa->data->format('Y');
        $mes = $despesa->data->format('n') - 1;

        $despesa->delete();

        $request->session()->flash('sucesso', 'Despesa(s) excluída com sucesso!');
        return redirect()->route('consulta.despesa', [
            'ano' => $ano,
            'mes' => $mes
        ]);
    }
}
