<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cartItems = ShoppingCart::where('user_id', Auth::id())
                                  ->where('status', 'pending')
                                  ->with('content')
                                  ->get();

        return view('shoppingcart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content_id' => 'required|exists:contents,id',
            'quantity' => 'required|integer|min:1',
        ]);

        ShoppingCart::updateOrCreate(
            ['user_id' => Auth::id(), 'content_id' => $request->content_id, 'status' => 'pending'],
            ['quantity' => $request->quantity]
        );

        return redirect()->route('shoppingcart.index')->with('success', 'Item added to cart successfully!');
    }

    public function destroy($id)
    {
        $cartItem = ShoppingCart::findOrFail($id);

        if ($cartItem->user_id == Auth::id() && $cartItem->status == 'pending') {
            $cartItem->delete();
            return redirect()->route('shoppingcart.index')->with('success', 'Item removed from cart successfully!');
        }

        return redirect()->route('shoppingcart.index')->with('error', 'You are not authorized to delete this item.');
    }

    public function checkout()
    {
        $cartItems = ShoppingCart::where('user_id', Auth::id())->where('status', 'pending')->get();

        // Logika untuk proses checkout dan pembayaran

        foreach ($cartItems as $item) {
            $item->status = 'paid';
            $item->save();
        }

        return redirect()->route('shoppingcart.index')->with('success', 'Checkout completed successfully!');
    }
}
