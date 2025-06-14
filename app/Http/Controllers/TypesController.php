<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TypesController extends Controller
{
     public function index()
    {
        return view('types.index', ['types' => Type::all()]); // esse segundo parametro é o nome da variavel que busca as coisas no banco de dados
    }

    public function create()
    { // mostra a view na tela
        return view('types.create');
    }

    public function store(Request $request)
    { // método post precisa da request
        Type::create([
            'name' => $request->name,
        ]);
        return redirect('/types')->with('success','Tipo atualizado com sucesso!');;
    }

        public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $type = Type::find($id);
        //retornamos a view passando a TUPLA de produto consultado
        return view('types.edit', ['type' => $type]);
    }
    public function update(Request $request)
    {
        $type = Type::find($request->id);
        //método update faz um update product set name = ? etc...
        $type->update([
            'name' => $request->name,
        ]);
        return redirect('/types')->with('success','Tipo atualizado com sucesso!');;
    }

    public function destroy($id){
        try{
            $type = Type::find($id);
            $type->delete();
            return redirect('/types')->with('success','Tipo excluído com sucesso!');
        } catch (QueryException $e) {
            if ($e->getCode()=== '23000'){
                return redirect('/types')->with('error','Não é possível excluir! Existem produtos vinculados à esse tipo');
            }
            return redirect('/types')->with('error','Erro inesperado');
        }
    }
}
