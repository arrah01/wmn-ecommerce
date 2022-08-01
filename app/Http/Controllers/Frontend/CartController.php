<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function addToCart(Request $request){

        $cart= new Cart;
        $cart->user_id=Auth::user()->id;
        $cart->product_id =$request-> product_id;
        $cart->product_qty=$request->product_qty;

        $cart->save();

        return redirect()->route('home');

        // if ($request ->session()->has('user')) {

        //    $cart= new Cart;
        //    $cart->user_id=$request->session()->get('user')['id'];
        //    $cart->product_id =$request-> product_id;
        //    $cart->product_qty=$request->product_qty;

        //    $cart->save();

        //    return redirect()->route('/');

        // } else {
        //      return redirect()->route('register');
        // }


    }

    public function viewCart(){

        $cartitems = Cart::where('user_id' , Auth::user()->id)->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function deleteCart($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
         return back()->with('status',"Cart Item Deleted successfully");

    }


    static function cartItems()
    {
       $userId= Session::get('user');

       return Cart::where('user_id',$userId)->count();
    }

}
