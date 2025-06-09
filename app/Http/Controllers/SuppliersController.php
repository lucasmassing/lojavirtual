<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{

    public function index(Request $request)
    {
        $filter = $request->input('search');
        if ($filter) {
            $suppliers = Supplier::where('name_reason', 'like', '%' . $filter . '%')->get();
        } else {
            $suppliers = Supplier::orderBy('name_reason','asc')->get();
        }
        return view('suppliers.index', ['suppliers' => $suppliers]);  // esse segundo parametro é o nome da variavel que busca as coisas no banco de dados
    }

    public function create()
    { // mostra a view na tela
        return view('suppliers.create');
    }

    public function store(Request $request)
    { // método post precisa da request
        $request->validate([
            'name_reason'=> 'required | min:2 | max:50',
            'type_enum' => 'required | min:1 | max:50',
            'cpf_cnpj' => 'required | gt:0',
            'phone' => 'required | gt:0'
        ]);
        Supplier::create([
            'name_reason' => $request->name_reason,
            'type_enum' => $request->type_enum,
            'cpf_cnpj' => $request->cpf_cnpj,
            'phone' => $request->phone,
        ]);
        return redirect('/suppliers')
        ->with('success','Fornecedor salvo com sucesso');
    }

    public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $supplier = Supplier::find($id)?->toArray();
        //retornamos a view passando a TUPLA de produto consultado
        return view('suppliers.edit',compact('supplier'));
    }
    public function update(Request $request)
    {
        $supplier = Supplier::find($request->id);
        //método update faz um update product set name = ? etc...
        $supplier->update([
            'name_reason' => $request->name_reason,
            'type_enum' => $request->type_enum,
            'cpf_cnpj' => $request->cpf_cnpj,
            'phone' => $request->phone
        ]);
        return redirect('/suppliers');
    }

    public function destroy($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('/suppliers');
    }
}
