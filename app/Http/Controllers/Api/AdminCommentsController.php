<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admincomments', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $searchTerm = $request->input('name');

        $comments = Comment::where('name', 'like', "%{$searchTerm}%")->get();

        return view('admincomments', compact('comments'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'comments' => 'required',
        ]);

        Comment::create([
            'name' => $request->name,
            'comments' => $request->comments,
        ]);

       return redirect()->back()->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */


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
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admincomments.index')->with('success', 'Comment deleted successfully.');
    }
}
