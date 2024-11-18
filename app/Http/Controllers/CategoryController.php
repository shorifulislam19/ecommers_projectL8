<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ShowCategory = Category::all();
        return view('admin.category.index',compact('ShowCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


       $category = new Category();
       $category->id = $request->category;
       $category->name = $request->name;
       $category->description = $request->description;

       if($request->hasFile('image')){
        $file = $request->file('image');
        $extenssion = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extenssion;
        $file->move('category', $fileName);
        $category->image = $fileName;
       }
       $category->save();
       return redirect('categories')->with('message','Category Added Successfuly!!');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Category $category)
    {
        if($category->status==1){
            $category->update(['status'=>0]);
        }
        else{
            $category->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfuly!!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
