<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewProduct()
    {
        return view('product.product');
    }


    public function viewSingleProduct(Request $request)
    {
        // dd($request->url_key);
        $products = Product::where('url_key', $request->url_key)->first();
        // dd($products);

        return view('product.product', ['product' => $products]);
    }
}
