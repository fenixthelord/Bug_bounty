<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showReports($productId)  
    {  
        $product = Product::findOrFail($productId);  

         
        $reports = $product->reports;  

        return view('products.reports', compact('product', 'reports'));  
    }  

}
