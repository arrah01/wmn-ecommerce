<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Catergory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {

        $products= Product::latest()->paginate(9);
        $catergories= Catergory::all();

        return view('frontend.shop', compact('products','catergories'));
    }



    public function viewcatergory($slug){

        if (Catergory::where('slug' , $slug)->exists()) {

            $catergories= Catergory::where('slug' , $slug)->first();
            $products = Product::where('catergory_id', $catergories->id)->get();
            return view('frontend.product.index', compact('catergories','products'));

        }
        else {

            return redirect()->route('home')->with('status',"Url does not exist");
        }

       }

       public function  DetailProduct($prod_slug , $cat_slug)
       {
                      $products= Product::where('slug' , $prod_slug)->first();
                      $catergories= Catergory::where('slug' , $cat_slug)->first();
                      return view('frontend.product.detail', compact('products','catergories'));

      }


}
