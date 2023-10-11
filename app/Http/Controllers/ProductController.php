<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function create(){

        return view('product.create');
    }

    public function insert(Request $request){                  //Product create

        $product=new Product();
        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('assets/product/',$filename);
            $product->image=$filename;
        }

        $product->save();
        return redirect('/')->with('status',"Product added Successful");
    }

    public function view(){                                     //Products view
        $product=Product::get()->all();
        return view('product.view',compact('product'));
    }

    public function update($id){
        $product=Product::find($id);
        return view('product.update',compact('product'));
    }

    public function edit(Request $request, $id) {               //Product details update
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
    
        if ($request->hasFile('image')) {
            $path = 'assets/product/' . $product->image;
    
            if (File::exists($path)) {
                File::delete($path);
            }
            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/product', $filename);

            $product->image = $filename;
        }
    
        $product->update();
        return redirect('/')->with('status', "Product updated successfully");
    }
    

    public function delete($id){                             //Product Delete
        $product=Product::find($id);
        if($product?->image){
            $path='assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product?->delete();
        return redirect('/')->with('status',"Product Deleted Successful");

    }

    

}
