<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::latest()->get();
      $cloths = DB::table('products')->where('category', 1)->latest()->get();
      $beautyTools = DB::table('products')->where('category', 2)->latest()->get();
      $bags = DB::table('products')->where('category', 3)->latest()->get();
      $others = DB::table('products')->where('category', 4)->latest()->get();
      return view('registrar/products', compact('products', 'cloths', 'beautyTools', 'bags', 'others'));
    }


    public function allProducts()
    {
      $products = Product::latest()->get();
      return view('admin.products.allProducts', compact('products') );
    }

    public function soldProducts()
    {
      $products = DB::table('products as pro')
                ->join('sales_items as sell', 'pro.id', 'sell.product_id')
                ->get();
      return view('admin.products.soldProducts', compact('products') );
    }

    public function notSoldProducts()
    {
      $products = DB::table('products as pro')
                ->join('sales_items as sell', 'pro.id', 'sell.product_id')
                ->where('sell.product_id', count([]))
                ->get();
      return view('admin.products.notSoldProducts', compact('products') );
    }

    public function exProducts()
    {
      $products = DB::table('products')->whereDate('expireDate', '>', 'Carbon::now()')->get();
      return view('admin.products.exProducts', compact('products') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('registrar/addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
            'productName'=>'required',
            'category'=>'required',
            'model'=>'nullable',
            'price'=>'required', 'max:255',
            'quantity'=>'required',
            'expireDate'=>'nullable',
            'image' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('image')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name);
        }
        else {
          $new_name = 'about.png';
        }
          Product::create([

              'productName' => request('productName'),
              'category' => request('category'),
              'model' => request('model'),
              'price' => request('price'),
              'quantity' => request('quantity'),
              'expireDate' => request('expireDate'),
              'image' => $new_name,
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),

            ]);
            return redirect('#');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('registrar/details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('registrar/editProduct',compact('product',$product));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Validate
        $request->validate([
          'productName'=>'required',
          'category'=>'required',
          'model'=>'nullable',
          'price'=>'required', 'max:255',
          'quantity'=>'required',
          'expireDate'=>'nullable',
        ]);

        $product->productName = $request->productName;
        $product->category = $request->category;
        $product->model = $request->model;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->expireDate = $request->expireDate;
        $product->image = $request->image;
        $product->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return redirect('/product');
    }
}
