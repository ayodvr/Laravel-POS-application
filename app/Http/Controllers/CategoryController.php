<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Staffs;
use App\User;
use App\AdminProfile;
use DB;
use App\Customers;
use App\Suppliers;
use App\Product;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('products')->paginate(10);
        //dd($categories);
        return view('category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[

                'cat_image'=>'image|nullable|max:1999',
                'cat_name'=>'required|max:185'
            ]);
    
                 //Handle file uploads
            if($request->hasFile('cat_image')){
                //Get file name with the extension
                $fileNameWithExt = $request->file('cat_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //Get just extension
                $extension = $request->file('cat_image')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload image
                $path = $request->file('cat_image')->storeAs('public/cat_image',$fileNameToStore);
                } else {
                $fileNameToStore = 'noimage.jpg';
                }

                //dd($request->all());
                $category = new Category;
                
                $category->cat_name = $request->cat_name;
                
                if($request->hasFile('cat_image')){
                    $category->cat_image = $fileNameToStore;
                }
    
                if($category->save()){
                    
                    notify()->success("Category Added!","Success");
    
                }
    
                return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

                'cat_name'=>'required|max:185'
            ]);
    
                 //Handle file uploads
            if($request->hasFile('cat_image')){
                //Get file name with the extension
                $fileNameWithExt = $request->file('cat_image')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                //Get just extension
                $extension = $request->file('cat_image')->getClientOriginalExtension();
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload image
                $path = $request->file('cat_image')->storeAs('public/cat_image',$fileNameToStore);
                } else {
                $fileNameToStore = 'noimage.jpg';
                }
                //dd($request->all());
                $category = Category::find($id);
                
                $category->cat_name = $request->cat_name;
                
                if($request->hasFile('cat_image')){
                    $category->cat_image = $fileNameToStore;
                }
    
                if($category->save()){
                    
                    notify()->success("Category Updated!","Success");
    
                }
    
                return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);

        $category->delete();
        
        notify()->success("Category Deleted!","Success");

        return redirect()->back();
    }
}
