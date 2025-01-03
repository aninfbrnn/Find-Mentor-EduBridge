<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Mentor;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('mentor')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id',
        ]);

        $existingItem = Cart::where('mentor_id', $request->mentor_id)->first();

        if ($existingItem) {
            $existingItem->increment('quantity');
        } else {
            Cart::create(['mentor_id' => $request->mentor_id, 'quantity' => 1]);
        }

        return redirect()->route('cart.index');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        $quantity = $request->quantity;
        if ($quantity < 1 || $quantity > 10) {
            return redirect()->route('cart.index')->withErrors('Quantity must be between 1 and 10.');
        }

        $cartItem->update(['quantity' => $quantity]);

        return redirect()->route('cart.index');
    }

    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index');
    }
}
