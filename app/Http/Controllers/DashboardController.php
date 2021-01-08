<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminDashboardController;
use App\Models\AdMob;
use App\Models\FormOrder;
use App\Models\LayoutPicker;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Show the index
     */
    public function index()
    {
        if(Auth::user()->role == 'admin') {
            return AdminDashboardController::index();
        }
        
        $user_id = Auth::user()->id;
        
        $this->check_form_order($user_id);
        $this->check_layout_picker($user_id);
        
        $user = User::where('id', $user_id)->with(['form_order', 'products', 'layout_picker', 'admob'])->first();
        $progress = FormOrder::where('id', $user->form_order->id)->with('progress')->first();

        if($user->form_order->pricing_id == 4 || $user->form_order->pricing_id == 3) {
            $this->check_admob($user_id);
            $user->admob;
        }

        return Inertia::render('Dashboard', [
            'data' => $user,
            'progress' => $progress->progress,
        ]);
    }

    private function check_form_order($user_id)
    {
        FormOrder::where('user_id', $user_id)->firstOrCreate(['user_id' => $user_id]);
    }

    private function check_layout_picker($user_id)
    {
        LayoutPicker::where('user_id', $user_id)->firstOrCreate(['user_id' => $user_id]);
    }

    private function check_admob($user_id)
    {
        AdMob::where('user_id', $user_id)->firstOrCreate(['user_id' => $user_id]);
    }
}
