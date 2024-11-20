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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.product.create',compact('categories','subcategories','brands','units','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validate all the fields
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'category' => 'required|integer',
    //         'subcategory' => 'required|integer',
    //         'brand' => 'required|integer',
    //         'unit' => 'required|integer',
    //         'size' => 'required|integer',
    //         'color' => 'required|integer',
    //         'price' => 'required|numeric',
    //         'code' => 'required|string',
    //         'description' => 'required|string',
    //         'file' => 'nullable|array',
    //         'file.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    //     ]);


    //     $product = new Product();


    //     $product->name = $request->name;
    //     $product->price = $request->price;
    //     $product->cat_id = $request->category;
    //     $product->subcat_id = $request->subcategory;
    //     $product->br_id = $request->brand;
    //     $product->unit_id = $request->unit;
    //     $product->size_id = $request->size;
    //     $product->color_id = $request->color;
    //     $product->description = $request->description;
    //     $product->code = $request->code;


    //     $images = array();
    //     if($files = $request->file('file')){
    //         $i=0;
    //         foreach($files as $file){
    //             $name =$file->getClientOriginalExtension();
    //             $fileNameExtract=explode('.',$name);
    //             $fileName=$fileNameExtract[0];
    //             $fileName.=time();
    //             $fileName.=$i;
    //             $fileName.='.';
    //             $fileName.=$fileNameExtract[1];
    //             $file->move('image',$fileName);
    //             $image[]=$fileName;
    //             $i++;
    //          }
    //          $product['image']=implode("|",$images);
    //          $product->save();
    //            return redirect('products')->with('message', 'Product Added Successfully!');
    //     }

    //     else{
    //         echo "error";
    //     }

    // }
    public function store(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|integer',
        'subcategory' => 'required|integer',
        'brand' => 'required|integer',
        'unit' => 'required|integer',
        'size' => 'required|integer',
        'color' => 'required|integer',
        'price' => 'required|numeric',
        'code' => 'required|string',
        'description' => 'required|string',
        'file' => 'nullable|array',
        'file.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $product = new Product();

    $product->name = $request->name;
    $product->price = $request->price;
    $product->cat_id = $request->category;
    $product->subcat_id = $request->subcategory;
    $product->br_id = $request->brand;
    $product->unit_id = $request->unit;
    $product->size_id = $request->size;
    $product->color_id = $request->color;
    $product->description = $request->description;
    $product->code = $request->code;

    $images = array();
    if ($files = $request->file('file')) {
        $i = 0;
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $fileNameExtract = explode('.', $name);

            if (count($fileNameExtract) > 1) {

                $fileName = $fileNameExtract[0];
                $fileName .= time();
                $fileName .= $i;


                $file->move('image', $fileName);
                $images[] = $fileName;
            } else {
                continue;
            }
        }
        $product['image'] = implode("|", $images);
        $product->save();

        return redirect('products')->with('message', 'Product Added Successfully!');
    } else {
        return redirect()->back()->with('error', 'No images were uploaded.');
    }
}


    /**
     * Display the specified resource.
     */
    public function change_status(Product $product)
    {
        if($product->status==1){
            $product->update(['status'=>0]);
        }
        else{
            $product->update(['status'=>1]);
        }
        return redirect()->back()->with('message','Status Change Successfuly!!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product)
    {
        // Get the product by ID
        $product = Product::findOrFail($product);

        // Retrieve all necessary related data for the form (e.g., categories, subcategories, brands, etc.)
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();

        // Pass the data to the view
        return view('admin.product.edit', compact('product', 'categories', 'subcategories', 'brands', 'units', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $product->name = $request->name;
        $product->price = $request->price;
        $product->cat_id = $request->category;
        $product->subcat_id = $request->subcategory;
        $product->br_id = $request->brand;
        $product->unit_id = $request->unit;
        $product->size_id = $request->size;
        $product->color_id = $request->color;
        $product->description = $request->description;
        $product->code = $request->code;


        $images = [];
        if ($files = $request->file('file')) {
            $i = 0;
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $fileNameExtract = explode('.', $name);

                if (count($fileNameExtract) > 1) {
                    $fileName = $fileNameExtract[0];
                    $fileName .= time();
                    $fileName .= $i;
                    $fileName .= '.' . $fileNameExtract[1];


                    $file->move('image', $fileName);


                    $images[] = $fileName;
                    $i++;
                } else {
                    continue;
                }
            }


            $product->image = implode("|", $images);
        }


        $product->update();


        return redirect('products')->with('message', 'Product Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $delete = $product->delete();

        if ($delete) {
            return redirect()->back()->with('message', 'Product Deleted Successfully!!');
        } else {
            return redirect()->back()->with('error', 'Failed to Delete Brand');
        }
    }
}
