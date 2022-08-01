<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catergory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CatergoryController extends Controller
{

    public function index() {

        $catergories= Catergory::all();

        return view('admin.catergory.index', compact('catergories'));
    }

     // store catergory

    public function store(Request $request){

        $catergory = new Catergory();

        if ($request-> hasFile('image')) {

            $file = $request->file('image');
            $ext= $file ->getclientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->storeAs('public/catergory_pic', $filename);
            $catergory ->image= $filename;
        }
        $catergory->name = $request->name;
        $catergory->slug = Str::slug($request->name);
        $catergory->description = $request->description;
        $catergory->status = $request->status==TRUE ? '1': '0';
        $catergory->popular = $request->popular==TRUE ? '1': '0';
        $catergory->meta_title = $request->meta_title;
        $catergory->meta_descrip = $request->meta_descrip;
        $catergory->meta_keywords = $request->meta_keywords;
        $catergory->save();
        return back()->with('status',"Catergory added successfully");

    }

    public function edit($id){

        $catergory = Catergory::findOrFail($id);
        return view('admin.catergory.edit' , compact('catergory'));

    }

    public function update(Request $request, $id){

        $catergory= Catergory::find($id);

        if ($request-> hasFile('image')) {

            $path = 'storage/catergory_pic/'. $catergory->image ;
            if (File::exists($path))
            {
               File::delete($path);
            }

            $file = $request->file('image');
            $ext= $file ->getclientOriginalExtension();
            $filename= time().'.'.$ext;
            $file->storeAs('public/catergory_pic', $filename);
            $catergory ->image= $filename;
        }
        $catergory->name = $request->name;
        $catergory->slug = Str::slug($request->name);
        $catergory->description = $request->description;
        $catergory->status = $request->status==TRUE ? '1': '0';
        $catergory->popular = $request->popular==TRUE ? '1': '0';
        $catergory->meta_title = $request->meta_title;
        $catergory->meta_descrip = $request->meta_descrip;
        $catergory->meta_keywords = $request->meta_keywords;
        $catergory->update();

        return redirect()->route('catergory')->with('status',"Catergory Updated successfully");
    }



    public function destroy($id){

        $catergory = Catergory::findOrFail($id);

        if ($catergory->image)
         {
            $path = 'storage/catergory_pic/'. $catergory->image ;
            if (File::exists($path))
            {
               File::delete($path);
            }
         }
        $catergory->delete();
        return back()->with('status',"Catergory Deleted successfully");

    }
}

