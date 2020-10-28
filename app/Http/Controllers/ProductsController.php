<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_data;

class ProductsController extends Controller
{
    public function get_all_prods() {
        dd('inside controller');
        $all_data = (new product_data)
                    ->get();
        
                    dd($all_data);
    }
}
