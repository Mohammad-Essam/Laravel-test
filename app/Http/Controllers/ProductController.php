<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('dashboard',[
            'products' => Product::all(),
        ]);
    }

    public function store(Request $request){
        $keys = array_keys($request->data[0]);
        $mapping = $request->mapping;
        foreach($request->data as $row)
        {
            $product = new Product();
            $product->name = $row[$keys[$mapping[0]]];
            $product->type = $row[$keys[$mapping[1]]];
            $product->qty = $row[$keys[$mapping[2]]];
            $product->save();
        }
         return response()->json(['success'=>'product is successfully added'],201);
    }
}
