<?php

namespace App\Http\Controllers\Api;

use App\Models\Coupon;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('code');

        if ($searchTerm) {
            $coupons = Coupon::where('code', 'like', "%{$searchTerm}%")->get();
        } else {
            $coupons = Coupon::all();
        }

        return view('coupon', compact('coupons'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Coupon::create($validatedData);

        return redirect()->route('coupon.index')->with('success', 'Coupon created successfully');
    }



    public function applyCoupon(Request $request)
{
    // Validate the coupon code
    $request->validate([
        'coupon_code' => 'required|string'
    ]);

    // Find the coupon
    $coupon = Coupon::where('code', $request->coupon_code)->first();

    if ($coupon) {
        // Store the discount percentage in the session
        session(['discount_percentage' => $coupon->discount]);
    } else {
        // Optionally, handle invalid coupon scenario
        return redirect()->back()->with('error', 'Invalid coupon code');
    }

    return redirect()->route('cart.index')->with('success', 'Coupon applied successfully!');
}



    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('editcoupon', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $validatedData = $request->validate([
            'code' => 'required|string',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $coupon->update($validatedData);

        return redirect()->route('coupon.index')->with('success', 'Coupon updated successfully');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->route('coupon.index')->with('success', 'Coupon deleted successfully');
    }





}
