<?php

namespace App\Http\Controllers;

use App\Models\FormOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requested_orders = self::get_requested_orders();
        $confirmed_orders = self::get_confirmed_orders();
        $rejected_orders = self::get_rejected_orders();

        return Inertia::render('Admin/UserRequest/Index', [
            'requested_orders' => $requested_orders,
            'confirmed_orders' => $confirmed_orders,
            'rejected_orders' => $rejected_orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with(['form_order', 'products', 'layout_picker'])->firstOrFail();

        return Inertia::render('Admin/UserRequest/Show', [
            'data' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get requested orders
     * 
     * @return \App\Models\FormOrder
     */
    private static function get_requested_orders()
    {
        return FormOrder::where(['requested' => 1, 'confirmed' => null, 'rejected' => null])->with('user')->get();
    }

    /**
     * Get confirmed orders
     * 
     * @return \App\Models\FormOrder
     */
    private static function get_confirmed_orders()
    {
        return FormOrder::where('confirmed', 1)->with('user')->get();
    }

    /**
     * Get rejected orders
     * 
     * @return \App\Models\FormOrder
     */
    private static function get_rejected_orders()
    {
        return FormOrder::where('rejected', 1)->with('user')->get();
    }
}
