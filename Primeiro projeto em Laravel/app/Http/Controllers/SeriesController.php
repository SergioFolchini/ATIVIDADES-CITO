<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::query()->orderBy('nome')->get();


        return view('series.index', compact('series'));
    }
    public function create()
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
        Serie::create($request->all());
        return to_route('series.index')->with('success', 'Série criada com sucesso!');
    }
    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();

        return redirect('/series')->with('success', 'Série removida com sucesso!');
    }

    public function edit($id)
    {
        $serie = Serie::findOrFail($id);
        return view('series.edit', compact('serie'));
    }
    public function update(Request $request, $id)
    {
        $serie = Serie::findOrFail($id);
        $serie->nome = $request->input('nome');
        $serie->save();

        return redirect()->route('series.index')->with('success', 'Série atualizada com sucesso!');
    }
}
