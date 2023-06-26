<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category(){
        $data=catagory::all();

        return view('admin.category', compact('data'));
    }

    public function add_catagory(Request $request){
        $data = new catagory;
        $data->catagory_name=$request->catagory;
        $data->save();
        return redirect()->back()->with('message','Catagory Added Successfully.');
    }

    public function delete_catagory($id){
        $data = catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message','Delete Successfully.');
    }

    public function open_add_product(){
        $catagory = catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request){
        $product = new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $image =$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image = $imagename;


        $product->save();
        return redirect()->back()->with('message','Add product Successfully.');
    }

    public function show_product(){
        $products = product::all();
        return view('admin.show_product', compact('products'));
    }

    public function delete_product($id){
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Delete Successfully.');
    }

    public function update_product($id){
        $product = product::find($id);
        $catagory = catagory::all();
        return view('admin.update_product', compact('product','catagory'));
    }

    public function edit_product_data(Request $request, $id){
        $product = product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $images=$request->image;
        if($request->image != null){
            $image =$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image = $imagename;
        }


        $product->save();
        return redirect()->back()->with('message','Update product Successfully.');
    }
}
