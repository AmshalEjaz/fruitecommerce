<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('shop')->get();

        // Calculate subtotal
        $subtotal = $cartItems->sum(function($item) {
            return $item->shop->price * $item->quantity;
        });

        // Retrieve the discount percentage from the session or default to 0
        $discountPercentage = session('discount_percentage', 0);

        // Calculate the discount amount based on the percentage
        $discount = $subtotal * ($discountPercentage / 100);

        // Calculate the total amount after applying the discount
        $total = $subtotal - $discount;

        return view('checkout', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
            'discountPercentage' => $discountPercentage
        ]);
    }

    public function store(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'address' => 'required|string',
        'city' => 'required|string',
        'country' => 'required|string',
        'postcode' => 'required|string',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'payment_method' => 'required|string',
        'order_notes' => 'nullable|string'
    ]);

    // Calculate subtotal, discount, and total
    $cartItems = Cart::where('user_id', Auth::id())->with('shop')->get();
    $subtotal = $cartItems->sum(function($item) {
        return $item->shop->price * $item->quantity;
    });

    $discountPercentage = session('discount_percentage', 0);
    $discount = $subtotal * ($discountPercentage / 100);
    $total = $subtotal - $discount;

    // Store the order in the database
    $order = Order::create([
        'user_id' => Auth::id(),
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'address' => $validated['address'],
        'city' => $validated['city'],
        'country' => $validated['country'],
        'postcode' => $validated['postcode'],
        'mobile' => $validated['mobile'],
        'email' => $validated['email'],
        'payment_method' => $validated['payment_method'],
        'order_notes' => $validated['order_notes'],
        'subtotal' => $subtotal,
        'discount' => $discount,
        'total' => $total,
    ]);

    // Clear the cart
    Cart::where('user_id', Auth::id())->delete();

    // Redirect or return a response
    return redirect()->route('index')->with('success', 'Order placed successfully! Your cart has been cleared.');
}



}
