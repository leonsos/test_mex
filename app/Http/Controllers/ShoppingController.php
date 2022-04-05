<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use App\Models\Shopping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        notify()->success('Thanks for your purchase!');   
        return redirect()->back();//->with('success', 'Thanks for your purchase!');   
    }
    public function make()
    {
        $user_data=Shopping::where('status','pending')->distinct()->get(['user_id']); 
        //dd($user_data); 
        if (!count($user_data))
        {
            notify()->error('There are no pending invoices!');   
             return redirect()->back();
        }else{

            foreach ($user_data as $data) {
                $users = DB::table('products')      
                ->leftJoin('shoppings', 'shoppings.product_id', '=', 'products.id')
                ->leftJoin('users', 'shoppings.user_id', '=', 'users.id')
                ->select(DB::raw('SUM(shoppings.price) as total'),
                DB::raw('SUM(shoppings.tax) as total_tax'),            
                DB::raw('SUM(shoppings.total_price) as total_bill')            
                )->where('shoppings.user_id', '=',  $data->user_id)
                ->where('shoppings.status', '=', 'pending')        
                ->get()->toArray();
                
                $bills=New Bill();
                $bills->total_amount=$users[0]->total;
                $bills->total_tax=$users[0]->total_tax;
                $bills->total_bill=$users[0]->total_bill;            
                $bills->post_date_end=carbon::now();
                $bills->save();
                $billsId=$bills->id;
    
                DB::table('shoppings')
                ->where('user_id','=',$data->user_id)
                ->where('shoppings.status','=', 'pending')
                ->update(['bill_id' => $billsId]);
    
                DB::table('shoppings')->where('user_id', $data->user_id)->update(['status' => 'completed']);
                
            }
            notify()->success('Thanks for your purchase!');   
            return redirect()->back();
        }
    }
}
