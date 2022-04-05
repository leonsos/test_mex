<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();        
        return view('home',compact('products'));
    }
    public function get_products()
    {
        $products = Product::all();        
        return view('products.index',compact('products'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products',
            'price' => 'required|unique:products',
            'tax' => 'required',
        ]);
        $products= New Product();
        $products->name=$request->input('name');
        $products->price=$request->input('price');
        $products->tax=$request->input('tax');
        $products->save();
        notify()->success('Product created succesfully!'); 
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $products = Product::findOrFail($id);
        $products->name=$request->input('name');
        $products->price=$request->input('price');
        $products->tax=$request->input('tax');        
        $products->update();
        notify()->success('Product updated!'); 
        return redirect()->back();
    }
    public function delete($id)
    {
        $producs = Product::findOrFail($id);
        $producs->delete();
        notify()->success('Product delete!'); 
        return redirect()->back();
    }
}
