<?php

namespace App\Http\Controllers;

use App\Models\FormOrder;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    /**
     * Show the index
     * 
     * @return Illuminate\Http\Response
     */
    public static function index()
    {
        $data = [
            'admin_count' => self::get_admins_count(),
            'user_count' => self::get_users_count(),
            'store_count' => self::get_stores_count(),
            'cashier_count' => self::get_cashiers_count(),
            'pending_requests' => self::get_pending_requests(),
            'pending_progress' => self::get_pending_progress_count(),
            'user_requests' => self::get_user_requests(),
            'user_progress' => self::get_pending_progress(),
            'special_request' => self::get_special_requests(),
            'special_progress' => self::get_special_progress_count(),
        ];
        
        return Inertia::render('Admin/Dashboard', [
            'data' => $data,
        ]);
    }

    /**
     * Get how many stores are there
     */
    private static function get_stores_count()
    {
        return FormOrder::where(['confirmed' => 1])->count();
    }

    /**
     * Get how many admins are there
     */
    private static function get_admins_count()
    {
        return User::where('role', 'admin')->count();
    }

    /**
     * Get how many users are there
     */
    private static function get_users_count()
    {
        return User::where('role', '!=', 'admin')->count();
    }

    /**
     * Get how many cashiers are there
     */
    private static function get_cashiers_count()
    {
        return User::where('role', 'cashier')->count();
    }

    /**
     * Get how many pending shops need to be approval
     */
    private static function get_pending_requests()
    {
        return FormOrder::where(['requested' => 1, 'confirmed' => null])->count();
    }

    /**
     * Retrieve the user requests
     */
    private static function get_user_requests()
    {
        return FormOrder::where(['requested' => 1, 'confirmed' => null])->get();
    }

    /**
     * Retrieve pending progresses
     */
    private static function get_pending_progress_count()
    {
        return Progress::where('is_published_on_google_play', null)->with('form_order')->count();
    }

    /**
     * Retrieve pending progresses
     */
    private static function get_pending_progress()
    {
        return Progress::where('is_published_on_google_play', null)->with('form_order')->get();
    }

    /**
     * Get how many pending shops need to be approval
     */
    private static function get_special_requests()
    {
        return FormOrder::where(['requested' => 1, 'confirmed' => null, 'pricing_id' => 4])->count();
    }

    /**
     * Retrieve the user requests
     */
    private static function get_special_progress_count()
    {
        return FormOrder::where(['requested' => 1, 'confirmed' => null, 'pricing_id' => 4])->get();
    }
}
