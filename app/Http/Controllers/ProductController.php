<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //admin panel

    //display products table
    public function index()
    {
        return view('admin.pages.products.index');
    }

    //create
    public function create()
    {
        return view('admin.pages.products.create');
    }

    //store
    public function store(Request $request)
    {
        return 'save products';
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
