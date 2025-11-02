<?php

namespace App\Http\Controllers;

use App\Models\Category;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('/categories/categories', ['categories' => $categories]);
    }
    
    public function post_cat()
    {
        $categories = Category::all();
        return view('/categories/categories', ['categories' => $categories]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/categories/category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('/categories/category_edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        $category->name = $request->name;
        $category->save();
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/categories');
    }
}
