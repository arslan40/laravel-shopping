<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        $products = Product::all();
        // dd($products);

        return view('category.category', compact('products'));
    }
}
