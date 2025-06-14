<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $types = Type::all();
        $selectedType = $request->input('type_id');

        $products = Product::with('type')
            ->when($selectedType, fn($query)=>$query->where('type_id',$selectedType))
            ->get();

        return view('dashboard', compact('products', 'types', 'selectedType'));
    }
}
