<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WebAppController extends Controller
{
    /**
     * Show the user's web app
     * 
     * @param int $user_id
     * @return \Illuminate\Http\Response
     */
    public function user_app($user_id)
    {
        $user = User::where(['id' => $user_id, 'role' => 'owner'])->with(['form_order', 'products', 'layout_picker'])->firstOrFail();

        $layout = "Layout{$user->layout_picker->layout_id}";

        return Inertia::render($layout, [
            'color' => $user->layout_picker->color_scheme_used,
        ]);
    }
}
