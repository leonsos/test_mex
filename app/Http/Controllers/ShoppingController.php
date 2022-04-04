<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shopping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function save(Request $request)
    {
        $id = $request->input('product_id');
        $price_product = Product::where('id',$id)->value('price');
        $tax_product = Product::where('id',$id)->value('tax');  
        $shoppings = New Shopping();
        $shoppings->product_id=$id;
        $shoppings->user_id=Auth::user()->id;
        $shoppings->price=$price_product;
        $shoppings->tax=$tax_product;
        $calc_tax=($price_product*$tax_product)/100;
        $shoppings->total_price=$price_product+$calc_tax;
        $shoppings->post_date=Carbon::now();
        $shoppings->save();        
    }
}
