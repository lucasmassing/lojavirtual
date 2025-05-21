<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $filter = $request->input('search');
        if ($filter) {
            $products = Product::where('name', 'like', "%filter%")->get();
        } else {
            $products = Product::with('type')->orderBy('name','asc')->get();
        }
        return view('products.index', ['products' => $products]);  // esse segundo parametro é o nome da variavel que busca as coisas no banco de dados
    }

    public function create()
    { // mostra a view na tela
        return view('products.create',[
            'types' => Type::all()
        ]);
    }

    public function store(Request $request)
    { // método post precisa da request
        $request->validate([
            'name'=> 'required | min:2 | max:50',
            'quantity' => 'required | gt:0',
            'price' => 'required | gt:0'
        ]);
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id,
        ]);
        return redirect('/products')
        ->with('sucess','Produto salvo com sucesso');
    }

    public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $product = Product::find($id);
        //retornamos a view passando a TUPLA de produto consultado
        return view('products.edit', ['product' => $product,'types' => Type::all()]);
    }
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        //método update faz um update product set name = ? etc...
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id
        ]);
        return redirect('/products');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
