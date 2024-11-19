<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);


       $brand = new Brand();
       $brand->id = $request->brand;
        $brand->name = $request->name;
        $brand->description = $request->description;
       $brand->save();
       return redirect('brands')->with('message','Brand Added Successfuly!!');
    }

    /**
     * Display the specified resource.
     */
    public function change_status(Brand $brand)
    {
        if($brand->status==1){
            $brand->update(['status'=>0]);
        }
        else{
            $brand->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfuly!!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->name = $request->name;
        $brand->description = $request->description;
    $brand->save();
    return redirect('/brands')->with('message', 'Brand updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $delete = $brand->delete();

        if ($delete) {
            return redirect()->back()->with('message', 'Brand Deleted Successfully!!');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete Brand');
        }
    }
}
