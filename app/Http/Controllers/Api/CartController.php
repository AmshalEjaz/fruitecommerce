<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Display the user's cart
    public function index()
    {
        // Get all cart items for the authenticated user
        $cartItems = Cart::where('user_id', Auth::id())->with('shop')->get();

        // Retrieve the discount percentage from the session or default to 0
        $discountPercentage = session('discount_percentage', 0);

        // Calculate the discount amount based on the percentage
        $discount = $cartItems->sum(function ($item) use ($discountPercentage) {
            return ($item->shop->price * $item->quantity) * ($discountPercentage / 100);
        });

        // Return the view with cart items, discount, and discount percentage
        return view('cart', [
            'cartItems' => $cartItems,
            'discount' => $discount,
            'discountPercentage' => $discountPercentage
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'quantity' => 'required|integer|min:1',
        ]);

     
        $userId = Auth::id();
        $cartItem = Cart::where('user_id', $userId)
            ->where('shop_id', $request->shop_id)
            ->first();

        if ($cartItem) {
            
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            
            Cart::create([
                'user_id' => $userId,
                'shop_id' => $request->shop_id,
                'quantity' => $request->quantity,
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }

    // Update the quantity of a cart item
    public function update(Request $request, Cart $cart)
    {
        // Check if the cart item belongs to the authenticated user
        if ($cart->user_id !== Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'Unauthorized action!');
        }

        // Validate the request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Update the quantity
        $cart->quantity = $request->quantity;
        $cart->save();

        // Redirect back with success message
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    // Remove an item from the cart
    public function destroy(Cart $cart)
    {
        // Check if the cart item belongs to the authenticated user
        if ($cart->user_id !== Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'Unauthorized action!');
        }

        // Delete the cart item
        $cart->delete();

        // Redirect back with success message
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}
