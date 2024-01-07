<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Cart, Menu};
use Auth;

class CartController extends Controller
{
    public function Index() {
        try {
            $userId = Auth::id();
            $allCart = Cart::where('user_id', $userId)->with('menu')->get();

            return view('cart', compact('allCart'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(["index_cart" => $th->getMessage()]);
        }
    }

    public function InsertToCart(int $menu_id) {
        try {
            $userId = Auth::id();
            Cart::create([
                "user_id" => $userId,
                "menu_id" => $menu_id
            ]);
            return redirect()->back()->withErrors(["insert_cart" => "ok"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(["insert_cart" => $th->getMessage()]);
        }
    }

    public function DeleteLog(Cart $cart_id) {
        try {
            $cart_id->delete();
            return redirect()->back()->withErrors(["delete_cart" => "ok"])->with("cart_id", array($cart_id->id));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(["delete_cart" => $th->getMessage()]);
        }
    }

    public function BulkDeleteLog(string $cart_ids) {
        try {
            // parse string into array
            $cart_ids = explode('+', $cart_ids);
            Cart::destroy($cart_ids);
            return redirect()->back()->withErrors(["delete_cart" => "ok"])->with("cart_id", $cart_ids);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(["delete_cart" => $th->getMessage()]);
        }
    }

    public function RestoreDeletedLog(string $cart_ids) {
        try {
            // dd($cart_ids);
            // parse string into array
            $cart_ids = explode('+', $cart_ids);
            $willRestoredLog = Cart::withTrashed()->whereIn('id', $cart_ids)->get();
            foreach ($willRestoredLog as $log) {
                $log->restore();
            }
            return redirect()->back()->withErrors(["undo_cart" => "ok"]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(["undo_cart" => $th->getMessage()]);
        }
    }
}
