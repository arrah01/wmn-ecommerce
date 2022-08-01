<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Catergory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{


    public function index(){

        $products= Product::all();
        $catergories= catergory::all();

      return view('admin.product.index', compact('products','catergories'));

    }



    public function store(Request $request){
        $product = new Product();

        if ($request-> hasFile('image')) {

            $file = $request->file('image');
            $ext= $file ->getclientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->storeAs('public/product_pic', $filename);
            $product ->image= $filename;
        }
        $product->catergory_id = $request->catergory_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->small_description = $request->small_description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty = $request->qty;
        $product->tax = $request->tax;
        $product->status = $request->status==TRUE ? '1': '0';
        $product->trending = $request->trending==TRUE ? '1': '0';
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->save();
        return redirect('products')->with('status', "product added sucessfully");



    }


    public function edit($id){

        $products = Product::findOrFail($id);
        return view('admin.product.edit' , compact('products'));

    }
    public function update(Request $request, $id){

        $product= Product::find($id);
        if ($request-> hasFile('image')) {

            $path = 'storage/product_pic/'. $product->image ;
            if (File::exists($path))
            {
               File::delete($path);
            }

            $file = $request->file('image');
            $ext= $file ->getclientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->storeAs('public/product_pic', $filename);
            $product ->image= $filename;
        }
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->description = $request->description;
            $product->small_description = $request->small_description;
            $product->original_price = $request->original_price;
            $product->selling_price = $request->selling_price;
            $product->qty = $request->qty;
            $product->tax = $request->tax;
            $product->status = $request->status==TRUE ? '1': '0';
            $product->trending = $request->trending==TRUE ? '1': '0';
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;
            $product->update();

        return redirect()->route('product')->with('status',"Product Updated successfully");
    }


    public function destroy($id){

        $product = Product::findOrFail($id);

        if ($product->image)
         {
            $path = 'storage/product_pic/'. $product->image ;
            if (File::exists($path))
            {
               File::delete($path);
            }
         }
        $product->delete();
        return back()->with('status',"Product Deleted successfully");

    }
}
