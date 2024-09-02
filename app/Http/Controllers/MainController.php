<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Shop;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $categories = Category::all();
        return view('index', compact('shops', 'categories'));
    }
    public function comments()
    {
        return view('comments');
    }
    public function about()
    {
        return view('about');
    }
    public function cart()
    {
        return view('cart');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function entercode()
    {
        return view('entercode');
    }
    public function forgetpassword()
    {
        return view('forgetpassword');
    }
    public function fproducts()
    {
        return view('fproducts');
    }
    public function newpassword()
    {
        return view('newpassword');
    }
    public function profile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
    public function shopdetail()
    {
        $comments = Comment::all();
        return view('shop-detail', compact('comments'));
    }
    public function shopdetail2()
    {
        return view('shopdetail2');
    }
    public function shop()
    {
        $items = Shop::with('category')->get();
        $categories = Category::all();
        return view('shop', compact('items', 'categories'));
    }

    public function updateprofile()
    {
        return view('updateprofile');
    }
    public function updateadminprofile()
    {
        $user = auth()->user();
        return view('updateadminprofile', compact('user'));
    }
    public function updateshop()
    {
        return view('updateshop');
    }
    public function verificationCode()
    {
        return view('verificationCode');
    }
    public function testimonial()
    {
        $comments = Comment::all();
        return view('testimonial', compact('comments'));
    }
    public function uploadtestimonial()
    {
        return view('uploadtestimonial');
    }
    public function adminprofile()
    {
        $user = auth()->user();
        return view('adminprofile', compact('user'));
    }
    public function showPrice(Request $request)
    {
        $maxPrice = $request->input('price', 0);
        if($maxPrice==0)
        {
            $items = Shop::all();

        }
        else
        {
            $items =Shop::where('price', '<=', $maxPrice)->get();
        }
        $categories =Category::all();
        return view('shop', compact('items','categories'));


    }

    public function adminupdatefunction(Request $request)
    {
        $user = auth()->user();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ensure email is unique, excluding the current user
            'password' => 'nullable|string|min:8|confirmed', // Password is optional (nullable)
        ]);

        // Update user's name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // If the password field is filled, update the password
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        // Save the updated user information
        $user->save();

        // Redirect to the profile page with a success message
        return redirect('adminprofile')->with('success', 'Profile updated successfully!');
    }
    public function admin()
    {
        $orders = Order::all();
        return view('admin',compact('orders'));
    }
}
