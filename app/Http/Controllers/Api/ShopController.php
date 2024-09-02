<?php

namespace App\Http\Controllers\Api;

use App\Models\Shop;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('name');

        if ($searchTerm) {
            $shops = Shop::where('name', 'like', "%{$searchTerm}%")->get();
        } else {
            $shops = Shop::with('category')->get();
        }
        $categories = Category::all();
        return view('uploadshop', compact('shops', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Store the uploaded file and get the file path
        $filePath = $request->file('file')->store('product_images', 'public');

        // Create a new product
        Shop::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Product created successfully!');
    }

    // public function show(string $id)
    // {
    //     // Find the product by ID
    //     $shops = Shop::findOrFail($id);
    //     // Return a view to show the product details
    //     return view('shops', compact('shops'));
    // }

    public function edit($id)
    {
        $shops = Shop::findOrFail($id);
        $categories = Category::all();
        return view('edituploadshop', compact('shops', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|mimes:jpeg,jpg,png|max:2048', // File is optional on update
        ]);

        $shops = Shop::findOrFail($id);

        if ($request->hasFile('file')) {
            // Delete the old file if a new one is uploaded
            Storage::disk('public')->delete($shops->file_path);

            // Store the new file and update the file path
            $filePath = $request->file('file')->store('product_images', 'public');
            $shops->file_path = $filePath;
        }

        // Update the product
        $shops->update([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('uploadshop.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $shops = Shop::findOrFail($id);

        // Delete the file associated with the product
        Storage::disk('public')->delete($shops->file_path);

        // Delete the product
        $shops->delete();

        return redirect()->route('uploadshop.index')->with('success', 'Product deleted successfully.');
    }
}
