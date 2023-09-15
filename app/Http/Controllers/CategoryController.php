<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //index
    public function index(){
        return view ('admin.Pages.Categories.index');
    }

    public function store(Request $request){
        
        //validate
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        //store
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        //return view
        return back()->with('success','Category Saved');
    }
}
