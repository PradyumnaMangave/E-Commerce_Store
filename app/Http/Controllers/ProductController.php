<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //admin panel

    //display products table
    public function index()
    {
        $products= Product::with('category')->orderBy('created_at','asc')->get();
        return view('admin.pages.products.index',['products'=>$products]);
    }

    //create
    public function create()
    {
        $categories=Category::all();
        $colors=Color::all();
        return view('admin.pages.products.create',['categories'=>$categories , 'colors'=>$colors]);
    }

    //store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'colors' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //store image
        $image_name ='products/' . time() . rand(0,999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public',$image_name);
        
        //store  data
        $product = Product::create([
            'title' => $request->title,
            'price' => $request->price*100,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $image_name
        ]);
        
        $product->colors()->attach($request->colors);

        //return view
        return back()->with('success','Product Saved');
    }

    //edit
    public function edit()
    {
        return 'edit product';
    }

    //update
    public function update()
    {
        return 'update product';
    }

    //destroy
    public function delete()
    {
        return 'delete product';
    }
}
