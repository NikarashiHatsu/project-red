<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PricingController extends Controller
{
    /**
     * Show the Index
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->with(['form_order', 'admob'])->first();

        return Inertia::render('Pricing/Index', [
            'data' => $user,
        ]);
    }
}
