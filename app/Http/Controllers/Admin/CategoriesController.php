<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;


class CategoriesController extends Controller
{
    public function show($id) {

        //Take all record width category id
        $category = Category::find($id);
        
        return view('admin.categories.show', compact('category'));
    }
}
