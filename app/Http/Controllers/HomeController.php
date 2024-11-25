<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = Product::where('status',1)->latest()->limit(12)->get();

       return view('frontend.welcome',compact('categories','subcategories','brands','units','sizes','colors','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function view_details($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $product = Product::findOrFail($id);
        $sizes = Size::find($product->size_id);
        $colors = Color::find($product->color_id);
       return view('frontend.pages.view_details',compact('categories','subcategories','brands','units','sizes','colors','product'));
    }
       public function product_by_cat($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('status',1)->where('cat_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));
    }
    public function product_by_subcat($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_subcat',compact('categories','subcategories','brands','products'));
    }
    public function product_by_brand($id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $products = Product::where('status',1)->where('br_id',$id)->limit(12)->get();
        return view('frontend.pages.product_by_brand',compact('categories','subcategories','brands','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
