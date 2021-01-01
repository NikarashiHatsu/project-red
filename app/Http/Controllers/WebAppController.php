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

        $layout = "WebApp/Layout{$user->layout_picker->layout_id_used}";

        return Inertia::render($layout, [
            'data' => $user,
        ]);
    }
}
