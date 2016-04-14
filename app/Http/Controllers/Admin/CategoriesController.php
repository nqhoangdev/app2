<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    //
    
    public function create() {
        return view('backend.categories.create');
    }
    
    public function store(CategoryFormRequest $request) {
        $category = new Category([
            'name' => $request->get('name')
        ]);
        
        $category->save();
        
        return redirect(action('Admin\CategoriesController@create'))->with('status', 'Added new category: ' . $category->name);
    }
    
    public function index() {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }
}
