<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    // showing product/index.blade.php page //
    public function index(){
        $products = Products::all();
        return view('product.index', ['products' => $products]);
    }

    // inserting products into database //
    public function store(Request $request){
        $data = $request->validate([
            'product_name' => 'required|string|max:30',
            'product_qty' => 'required|numeric|max:9',
            'product_price' => 'required|decimal:0,2|max:9',
            'product_description' => 'nullable|string|max:255'
        ]);

        $newProduct = Products::create($data);
        return redirect('product.index');
    }

}
