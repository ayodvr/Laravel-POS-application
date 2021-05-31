<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Staffs;
use App\User;
use App\AdminProfile;
use DB;
use App\Customers;
use App\Suppliers;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','asc')->get();
        $categories = Category::pluck('cat_name','id');
        //dd($categories);
        return view('products.index')->with('products',$products)->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id','desc')->get();

        return view('products.create')->with('category',$category);
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
         
            'prod_image'=>'image|nullable|max:1999',
            'name'=>'required|max:15',
            'cat_id'=>'required',
            'quantity'=>'required|max:185',
            'description'=>'required|max:499',
            'cost_price'=>'required',
            'selling_price'=>'required'
        ]);

             //Handle file uploads
        if($request->hasFile('prod_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('prod_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('prod_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('prod_image')->storeAs('public/prod_image',$fileNameToStore);
            } else {
            $fileNameToStore = 'noimage.jpg';
            }

            //dd($request->all());
            $product = new Product;
            
            $product->name = $request->name;
            $product->prod_image = $fileNameToStore;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->cost_price = $request->cost_price;
            $product->selling_price = $request->selling_price;
            $product->cat_id = $request->cat_id;
            
            
            if($product->save()){

                notify()->success("Product Added!","Success");

            }

            return redirect()->back();
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
        $product = Product::findorfail($id);
        $categories = Category::all();
        //dd($product);
        return view('products.edit')->with('product',$product)->with('categories',$categories);
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

            'prod_image'=>'image|nullable|max:1999',
            'name'=>'required|max:15',
            'quantity'=>'required|max:185',
            'description'=>'required|max:499',
            'cost_price'=>'required',
            'cat_id'=>'required',
            'selling_price'=>'required|max:185'  
        ]);

             //Handle file uploads
        if($request->hasFile('prod_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('prod_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('prod_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload image
            $path = $request->file('prod_image')->storeAs('public/prod_image',$fileNameToStore);
            } else {
            $fileNameToStore = 'noimage.jpg';
            }
            //dd($request->all());
            $product = Product::find($id);
            
            $product->name = $request->name;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->cost_price = $request->cost_price;
            $product->selling_price = $request->selling_price;
            $product->cat_id = $request->cat_id;
            
            if($request->hasFile('prod_image')){
                $product->prod_image = $fileNameToStore;
            }

            if($product->save()){
                
                notify()->success("Product Updated!","Success");

                return redirect()->route('products.index');
            }

            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);

        $product->delete();
        
        notify()->success("Product Deleted!","Success");

        return redirect()->back();
    }


    public function dmp(Request $request){

        $id = $request->id;
       
        foreach ($id as $user){

            Product::where('id', $user)->delete();
        }
        notify()->success("Product Deleted!","Success");

        return redirect()->back();
    }
}
