<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;


class HomeController extends Controller
{
    public function index(){
        $product = product::paginate(10);
        return view('home.userpage', compact('product'));
    }

    public function redirect(){
        $usertype =Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.home');
        }else{
            $product = product::paginate(10);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id){
        $data = product::find($id);
        return view('home.product_detail',compact('data'));
    }

    public function add_cart($id){
        if(Auth::id()){
            $user=Auth::user();
            $data = product::find($id);

            $cart = new cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->name = $user->name;
            $cart->product_title = $data->title;
            $cart->quantity = 1;
            if($data->discount_price!=null){
                $cart->price = $data->discount_price;
            }else{
                $cart->price = $data->price;
            }
            $cart->image = $data->image;
            $cart->product_id = $data->id;
            $cart->user_id = $user->id;

            $cart->save();
            return redirect()->back()->with('message','Successfully Add to Cart.');
        }else{
            return redirect('login');
        }
    }
}
