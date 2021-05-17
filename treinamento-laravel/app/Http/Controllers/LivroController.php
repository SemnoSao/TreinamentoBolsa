<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::all();
        return view('listarLivros')->withLivro($livros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastroLivro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Livro::create([
            'nome' => $request->nome,
            'autor' => $request->autor,
        ]);
        return "Livro Criado com Sucesso! <a href='" . route('index.livro') . "' >Voltar ao Index</a>";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        return view('verLivro', ['livro' => Livro::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        return view('editarLivro', ['livro' => Livro::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Livro::findOrFail($id)->update([
            $livro->nome = $request->nome,
            $livro->autor = $request->autor,
        ]);
       
        return "Livro Atualizado com Sucesso! <a href='" . route('index.livro') . "' >Voltar ao Index</a>";
    }

    public function delete($id)
    {
        return view('deletarLivro', ['livro' => Livro::findOrFail($id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        Livro::findOrFail($id)->delete();

        return "Livro Excluído com Sucesso <a href='" . route('index.livro') . "' >Voltar ao Index</a>";
    }
}
