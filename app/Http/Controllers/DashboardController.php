<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AdminDashboardController;
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
        
        $user = User::where('id', $user_id)->with(['form_order', 'products', 'layout_picker'])->first();

        return Inertia::render('Dashboard', [
            'data' => $user,
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
}
