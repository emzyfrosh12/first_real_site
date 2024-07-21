<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.product.index', 
        [
        'categories' => Category::all(),
        'product' => Product::paginate(5)
         ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->picture);

        $product = new Product();
        $product->name = $request->name;
        $product->prize = $request->prize;
        $product->categories_id = $request->categories_id;
        $product->description = $request->description;
        $product->save();

        $picture = $request->picture;

        foreach ($picture as $pictures) {
            $extension = $pictures->getClientOriginalExtension();
            $fileNameToStore = uniqid() . time() . '.' . $extension;
            Storage::put('public/products_pictures/' . $fileNameToStore, fopen($pictures, 'r+'));

            $productImage = new ProductImage();
            $productImage->product_id = $product->id;
            $productImage->name = $fileNameToStore;
            $productImage->save();
        }

        return back()->with('success', 'Product added successfully');
    }


    
public function delete($id){
    Product::where('id', $id)->delete();
    return redirect()->route('admin.product');
}


public function edit($product_id)
{

    $product = Product::findOrFail($product_id);

    return view('admin.product.edit', ['product' => $product, 'categories' => Category::all() ] );
}

    /**
     * Store a newly created resource in storage.
     */
    public function view()
    {
        return view('admin.product.view', 
        [
        'product' => Product::all(),
        'categories' => Category::all() 
         ]);
    }

    
public function search(Request $request)
{
    $product = Product::query();

    if ($request->has('search')) {
        $product->where('name', 'like', '%' . $request->search . '%');
    }

    $product = $product->get();

    return redirect()->route('admin.product', compact('product'));
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
