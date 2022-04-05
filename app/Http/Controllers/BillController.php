<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index_dashbord()
    {
        $bills = Bill::all();        
        return view('dashboard',compact('bills'));
        
    }
    public function details($id)
    {
        $bills_details = DB::table('shoppings')            
        ->leftJoin('products', 'shoppings.product_id', '=', 'products.id')                      
        ->select('products.name as name','shoppings.price as price',
        'shoppings.tax as tax','shoppings.total_price as total')
        ->where('shoppings.bill_id',$id)        
        ->where('shoppings.status','=','completed')
        ->orderBy('shoppings.created_at') 
        ->get();
        dd($bills_details);
    }
}
