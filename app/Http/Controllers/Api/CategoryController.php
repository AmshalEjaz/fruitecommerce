<?php
namespace App\Http\Controllers\Api;

use Category as model;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('name');

        if ($searchTerm)
        {
            $categories = Category::where('name', 'like', "%{$searchTerm}%")->get();
        } else {
            $categories = Category::all();
        }
        return view('categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    public function show(string $id)
    {
        // Find the category by ID
        $category = category::findOrFail($id);
        // Return a view to show the category details
        return view('category', compact('category'));
    }

    public function edit($id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);

        // Pass the category to the view
        return view('editcatagory', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->only('name', 'description'));

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search for categories based on the query
        $categories = Category::where('name', 'LIKE', "%{$query}%")->get();

        if($categories->isEmpty()) {
            return view('category', [
                'message' => 'No categories found for your search query.',
                'search' => $query
            ]);
        }

        return view('category', [
            'categories' => $categories,
            'search' => $query
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
