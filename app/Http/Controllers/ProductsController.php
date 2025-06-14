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
            $products = Product::where('name', 'like', '%' . $filter . '%')->get();
        } else {
            $products = Product::with('type')->orderBy('name', 'asc')->get();
        }
        return view('products.index', ['products' => $products]);  // esse segundo parametro é o nome da variavel que busca as coisas no banco de dados
    }

    public function create()
    { // mostra a view na tela
        return view('products.create', [
            'types' => Type::all()
        ]);
    }

    public function store(Request $request)
    { // método post precisa da request
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image_path' => 'required|image|mimes:jpg,jpeg,png|max:2048', // max 2mb
        ], [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.min' => 'O nome deve ter no mínimo :min caracteres.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',

            'quantity.required' => 'A quantidade é obrigatória.',

            'price.required' => 'O preço é obrigatório',

            'image.required' => 'A imagem do produto é obrigatória.',
            'image.max' => 'A imagem deve ter no máximo 2MB.',
        ]);

        // armazenar a imagem
        $imagePath = $request->file('image_path')->store('images', 'public');
        $imageName = basename($imagePath);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'image_path' => $imageName,
        ]);
        return redirect('/products')
            ->with('success', 'Produto salvo com sucesso');
    }

    public function edit($id)
    {
        //find é o método que faz select * from products where id= ?
        $product = Product::find($id);
        //retornamos a view passando a TUPLA de produto consultado
        return view('products.edit', ['product' => $product, 'types' => Type::all()]);
    }
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        //método update faz um update product set name = ? etc...
        $request->validate([
            'name' => 'required|min:2|max:50',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required' => 'O nome do produto é obrigatório.',
            'name.min' => 'O nome deve ter no mínimo :min caracteres.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',

            'quantity.required' => 'A quantidade é obrigatória.',

            'price.required' => 'O preço é obrigatório',

            'image.required' => 'A imagem do produto é obrigatória.',
            'image.max' => 'A imagem deve ter no máximo 2MB.',
        ]);

        // Prepara os dados para atualização
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'type_id' => $request->type_id,
        ];

        if($request->hasFile('image_path')){
            $imagePath = $request->file('image_path')->store('images', 'public');
            $imageName = basename($imagePath);
            $data['image_path'] = $imageName;
        }

        $product->update($data);

        return redirect('/products')->with('success','Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
