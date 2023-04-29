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

            if(array_key_exists('name',$row)){
                $product->name = $row['name'];
            }
            else
            {
                $product->name = $row[$keys[$mapping[0]]];
            }

            if(array_key_exists('type',$row)){
                $product->type = $row['type'];
            }
            else
            {
                $product->type = $row[$keys[$mapping[1]]];
            }

            if(array_key_exists('qty',$row)){
                $product->qty = $row['qty'];
            }
            else
            {
                $product->qty = $row[$keys[$mapping[2]]];
            }
            $product->save();
        }
         return response()->json(['success'=>'product is successfully added'],201);
    }
}
