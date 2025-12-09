<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $tableNumber = $request->query('table');
        if ($tableNumber) {
            Session::put('table_number', $tableNumber);
        }

        $items = Item::where('is_active', true)->orderBy('name', 'asc')->get();

        return view('customer.menu', compact('items', 'tableNumber'));
    }

    public function cart()
    {
        $cart = Session::get('cart');
        return view('customer.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $menuId = $request->input('id');
        $menu = Item::find($menuId);

        if (!$menu) {
            return response()->json([
                'status' => 'error',
                'message' => 'Menu tidak ditemukan.'
            ]);
        }

        $cart = Session::get('cart');

        if (isset($cart[$menuId])) {
            $cart[$menuId]['qty'] += 1;
        } else {
            $cart[$menuId] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'image' => $menu->img,
                'qty' => 1
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'message' => 'Menu berhasil ditambah ke keranjang.',
            'cart' => $cart
        ]);
    }

    public function updateCart(Request $request)
    {
        $itemId = $request->input('id');
        $newQty = $request->input('qty');

        if ($newQty <= 0) {
            return response()->json([
                'success' => false,
            ]);
        }

        $cart = Session::get('cart');
        if (isset($cart[$itemId])) {
            $cart[$itemId]['qty'] = $newQty;
            Session::put('cart', $cart);
            Session::flash('success', 'Jumlah item berhasil diperbarui');

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $itemId = $request->input('id');

        $cart = Session::get('cart');
        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            Session::put('cart', $cart);
            return response()->json([
                'success' => true,
                'message' => 'Item berhasil dihapus dari keranjang.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Item tidak ditemukan di keranjang.'
        ]);
    }

    public function clearCart()
    {
        Session::forget('cart');
        Session::flash('success', 'Keranjang berhasil dikosongkan');
        return redirect()->route('menu')->with('success', 'Keranjang berhasil dikosongkan');
    }
}
