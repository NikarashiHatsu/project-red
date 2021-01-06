<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WebAppController extends Controller
{
    /**
     * Show the user's web app
     * 
     * @param int $user_id
     * @return \Inertia\Inertia
     */
    public function user_app($user_id)
    {
        $user = User::where(['id' => $user_id, 'role' => 'owner'])->with(['form_order', 'products', 'layout_picker'])->firstOrFail();

        $layout = "WebApp/Layout{$user->layout_picker->layout_id_used}";

        return Inertia::render($layout, [
            'data' => $user,
        ]);
    }

    /**
     * Show the user's product
     * 
     * @param int $user_id
     * @param int $product_id
     * @return \Inertia\Inertia
     */
    public function user_product($user_id, $product_id)
    {
        $prod = Product::findOrFail($product_id);
        $layout = User::where('id', $user_id)->with('layout_picker')->first();

        if($prod->user_id == $user_id) {
            return Inertia::render('WebApp/ProductDetail', [
                'data' => $prod,
                'color_choosen' => $layout->layout_picker->color_scheme_used,
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Show the user's cart
     * 
     * @return Inertia\Inertia
     */
    public function cart($user_id)
    {
        $user = User::where('id', $user_id)->with('layout_picker')->first();

        if($user->id == $user_id) {
            return Inertia::render('WebApp/Cart', [
                'data' => $user,
                'color_choosen' => $user->layout_picker->color_scheme_used,
            ]);
        } else {
            abort(404);
        }
    }
}
