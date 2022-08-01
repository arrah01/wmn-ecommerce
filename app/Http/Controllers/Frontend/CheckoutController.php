<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index(){

      $old_cartitems = Cart::where('user_id' , Auth::user()->id)->get();

      foreach ($old_cartitems as $item) {
        if (!Product::where('id' , $item->product_id)->where('qty','>=',$item->product_qty)->exists()) {

            $removeItem= Cart::where('user_id' , Auth::user()->id)->where('product_id',$item->product_id)->first();
            $removeItem->delete();
        }

      }
        $cartitems = Cart::where('user_id' , Auth::user()->id)->get();
        return view('frontend.checkout' , compact('cartitems'));
    }

    public function placeOrder(Request $request){

         $order= new Order();
         $order->user_id = Auth::user()->id;
         $order->fname = $request->fname;
         $order->lname = $request->lname;
         $order->email = $request->email;
         $order->phone = $request->phone;
         $order->address1 = $request->address1;
         $order->address2 = $request->address2;
         $order->city = $request->city;
         $order->state = $request->state;
         $order->country = $request->country;
         $order->pincode = $request->pincode;
         $order->message = $request->message;
         $order->tracking_no = 'WNM'.rand(1111,9999);

        //total price
        $total=0;
        $cartitems_total = Cart::where('user_id' , Auth::user()->id)->get();
        foreach ($cartitems_total as $prod) {
           $total += $prod->product->selling_price * $prod->product->product_qty;
        }
         $order ->total_price= $total;

         $order->save();


         $cartitems = Cart::where('user_id' , Auth::user()->id)->get();

         foreach($cartitems as $item) {
            OrderItem::create([
                'order_id'=>$order->id,
                'product_id'=>$item->product_id,
                'qty'=>$item ->product_qty,
                'price'=> $item->product->selling_price,

            ]);


            $prod= Product::where('id', $item->product_id)->first();
            $prod->qty = $prod->qty -$item->product_qty ;
            $prod-> update();
         }
         $cartitems = Cart::where('user_id' , Auth::user()->id)->get();
         Cart::destroy($cartitems );
         return redirect()->route('home');
    }
}
