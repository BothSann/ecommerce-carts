<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = new Product();

        // Handle thumbnail if provided
        if($request->hasFile("product_thumbnail")) {
            $fileName = $request->file("product_thumbnail")->store("", "public");
            $filePath = "uploads/$fileName";
            $product->thumbnail = $filePath;
        }
        
        // Handle product details
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->short_description = $request->product_short_description;
        $product->quantity = $request->product_quantity;
        $product->sku = $request->product_sku;
        $product->description = $request->product_description;

        $product->save();   


        // Handle colors if provided
        if ($request->has("product_colors") && $request->filled("product_colors")) {
            foreach($request->product_colors as $color) {
                ProductColor::create([
                    "product_id" => $product->id,
                    "name" => $color
                ]);
            }
        }

        // Handle images if provided
        if($request->hasFile("product_images")) {
            foreach($request->file("product_images") as $image) {
                $fileName = $image->store("", "public");
                $filePath = "uploads/" . $fileName;
                ProductImage::create([
                    "product_id" => $product->id,
                    "path" => $filePath
                ]);
            }
        }
        return redirect("/product");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::with(["colors", "images"])->findOrFail($id);
        $colors = $product->colors->pluck("name")->toArray();
        return view( "admin.product.edit", compact("product", "colors" ));
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        //
        $product = Product::findOrFail($id);

        // Handle thumbnail if provided
        if($request->hasFile("product_thumbnail")) {
            // Delete the old thumbnail if it exists
            File::delete(public_path($product->thumbnail));
            $fileName = $request->file("product_thumbnail")->store("", "public");
            $filePath = "uploads/$fileName";
            $product->thumbnail = $filePath;
        }
        
        // Handle product details
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->short_description = $request->product_short_description;
        $product->quantity = $request->product_quantity;
        $product->sku = $request->product_sku;
        $product->description = $request->product_description;

        $product->save();   


        // Handle colors if provided
        if ($request->has("product_colors") && $request->filled("product_colors")) {

            // Delete existing colors
            foreach($product->colors as $color) {
                $color->delete();
            }

            foreach($request->product_colors as $color) {
                ProductColor::create([
                    "product_id" => $product->id,
                    "name" => $color
                ]);
            }
        }

        // Handle images if provided
        if($request->hasFile("product_images")) {
            // Delete existing images
            foreach($product->images as $image) {
                File::delete(public_path($image->path));
                $image->delete();
            }

            foreach($request->file("product_images") as $image) {
                $fileName = $image->store("", "public");
                $filePath = "uploads/" . $fileName;
                ProductImage::create([
                    "product_id" => $product->id,
                    "path" => $filePath
                ]);
            }
        }

        return redirect("/product");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->colors()->delete();
        File::delete(public_path($product->thumbnail));
        foreach($product->images as $image) {
            File::delete(public_path($image->path));
            $image->delete();
        }
        $product->delete();
        return redirect("/product");
    }
}
