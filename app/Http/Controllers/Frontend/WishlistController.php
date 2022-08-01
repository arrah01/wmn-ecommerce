<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    

    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    public function addTowishlist(Request $request)
    {
        $wishlist= new Wishlist;
        $wishlist->user_id=Auth::user()->id;
        $wishlist->product_id =$request-> product_id;
        $wishlist->save();
        return redirect()->route('home')->with('status',"Item Added to Wishlist");
    }

    public function deletewishlist($id){
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
         return back()->with('status',"wishlist Item Deleted successfully");

    }
}
