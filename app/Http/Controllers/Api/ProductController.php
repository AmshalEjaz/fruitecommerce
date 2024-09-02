<?php

namespace App\Http\Controllers\Api;

use Product as model;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('name');

        if ($searchTerm)
        {
            $products = Product::where('name', 'like', "%{$searchTerm}%")->get();
        } else {
            $products = Product::with('category')->get();

        }
        $categories = Category::all();
        return view('featuredproducts', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'actual_price' => 'required|numeric|min:0',
            'discounted_price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|mimes:jpeg,jpg,png|max:2048', // Assuming image upload
        ]);

        // Store the uploaded file and get the file path
        $filePath = $request->file('file')->store('product_images', 'public');

        // Create a new product
        Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'actual_price' => $request->actual_price,
            'discounted_price' => $request->discounted_price,
            'category_id' => $request->category_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('featuredproducts.index')->with('success', 'Product created successfully!');
    }
    public function showProducts(Request $request)
    {
        $maxPrice = $request->input('price', 0);

        $featuredProducts = Product::where('actual_price', '<=', $maxPrice)->get();
        $categories = Category::all();
        return view('shop', compact('featuredProducts', 'categories'));
    }
    public function filterProducts(Request $request)
    {
        $categoryId = $request->input('category_id');
        $categories = Category::all();

        if ($categoryId) {
            $products = Product::where('category_id', $categoryId)->get();
        } else {
            $products = Product::all();
        }

        return view('fproducts', compact('products', 'categories'));
    }

    public function show(string $id)
    {
        // Find the category by ID
        $product = Product::findOrFail($id);
        // Return a view to show the category details
        return view('products', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('editfeaturedproduct', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'actual_price' => 'required|numeric|min:0',
            'discounted_price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|mimes:jpeg,jpg,png|max:2048', // File is optional on update
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('file')) {
            // Delete the old file if a new one is uploaded
            Storage::disk('public')->delete($product->file_path);

            // Store the new file and update the file path
            $filePath = $request->file('file')->store('product_images', 'public');
            $product->file_path = $filePath;
        }

        // Update the product
        $product->update([
            'name' => $request->name,
            'details' => $request->details,
            'actual_price' => $request->actual_price,
            'discounted_price' => $request->discounted_price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('featuredproducts.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete the file associated with the product
        Storage::disk('public')->delete($product->file_path);

        // Delete the product
        $product->delete();

        return redirect()->route('featuredproducts.index')->with('success', 'Product deleted successfully.');
    }
}
