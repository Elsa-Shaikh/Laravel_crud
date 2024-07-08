<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        return view('products.index',['products'=>Product::get()]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $req){
      //validation
      $req->validate([
        'name' => 'required | min:3',
        'description' => 'required | min:5',
        'image' => 'required | mimes:jpeg,jpg,png,gif | max:10000'
      ]);

        // dd($req->all());
        //upload Images
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('products'),$imageName);
        // dd($imageName);
        $product = new Product();
        $product->image = $imageName;
        $product->name = $req->name;
        $product->description = $req->description;

        $product->save();
        return back()->withSuccess('Product Created Successfully!');
        
    }
    public function edit($id){
      // dd($id);
      $product = Product::where('id',$id)->first();

      return view('products.edit',['product'=>$product]);
    }
    public function update(Request $req,$id){
      // dd($id());
       //validation
       $req->validate([
        'name' => 'required | min:3',
        'description' => 'required | min:5',
        'image' => 'nullable | mimes:jpeg,jpg,png,gif | max:10000'
      ]);
      $product = Product::where('id',$id)->first();
      if(isset($req->image)){
        //upload Images
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('products'),$imageName);
        $product->image = $imageName;
        }
        $product->name = $req->name;
        $product->description = $req->description;
        $product->save();
        return back()->withSuccess('Product Updated Successfully!');       
    }
    public function destroy($id){
      $product =  Product::where('id',$id)->first();
       $product->delete();
       return back()->withSuccess('Product Deleted Successfully!');       
    }
}
