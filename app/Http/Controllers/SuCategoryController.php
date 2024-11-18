<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Show_subCategory = SubCategory::all();
        return view('admin.subcategory.index',compact('Show_subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategory = Category::all();
        return view('admin.subcategory.create',compact('subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',

        ]);


       $subcategory = new SubCategory();
       $subcategory->cat_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;

       $subcategory->save();
       return redirect('sub-categories')->with('message','Sub Category Added Successfuly!!');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(SubCategory $subcategory)
    {
        if ($subcategory->status == 1) {
            $subcategory->update(['status' => 0]);
        } else {
            $subcategory->update(['status' => 1]);
        }

        return redirect()->back()->with('message', 'Status changed successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, SubCategory $subcategory)
    {

        $subcategory->name = $request->name;
        $subcategory->cat_id = $request->category;
        $subcategory->description = $request->description;

        $subcategory->save();
        return redirect('/sub-categories')->with('message', 'Sub Category updated successfully!');
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->back()->with('message', 'Sub Category Deleted Successfully!!');
    }
}
