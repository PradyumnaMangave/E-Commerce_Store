<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //index
    public function index(){
        return view ('admin.Pages.Categories.index');
    }
}
