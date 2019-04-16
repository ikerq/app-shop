<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request){
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")->paginate(10);
        if($products->count() == 1){
            $id = $products->first()->id;
            return redirect("products/$id");//ojo las comillas dobles si inerpretan las variables dentro
        }
        return view('search.show')->with(compact('products','query'));
    }

    public function data(){
        $products = Product::pluck('name');
        return $products;
    }
}
