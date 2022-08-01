<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Catergory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{

    public function index(){


        $featured_products = Product::where('trending', '1')->take(8)->get();
        $new_products = Product::where('status', '1')->take(8)->get();
        //$catergories= Catergory::all();

        return view('frontend.index', compact('featured_products','new_products'));
    }

    public function contact()
    {

        return view('frontend.contact');
    }


    public function catergory(){

        $catergories = Catergory::where('status' , '1')->get();
        return view('frontend.catergory', compact('catergories'));
    }

       public function viewcatergory($slug){

        if (Catergory::where('slug' , $slug)->exists()) {

            $catergories= Catergory::where('slug' , $slug)->first();
            $products = Product::where('catergory_id', $catergories->id)->where('status','1')->get();
            return view('frontend.product.index', compact('catergories','products'));

        }
        else {

            return redirect()->route('home')->with('status',"Url does not exist");
        }

       }

        public function  DetailProduct($cat_slug, $prod_slug)
         {

           if (Catergory::where('slug' , $cat_slug)->exists()) {


                    if (Product::where('slug' , $prod_slug)->exists()){

                        $products= Product::where('slug' , $prod_slug)->first();
                        $catergories= Catergory::where('slug' , $cat_slug)->first();

                        return view('frontend.product.detail', compact('products','catergories'));
                    }
                    else {

                        return redirect()->route('home')->with('status',"Url does not exist");
                    }

                }
                else {

                    return redirect()->route('home')->with('status',"Url does not exist");
                }

        }

}
