<?php

namespace App\Http\Controllers;

use App\Models\LayoutPicker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LayoutPickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->with(['form_order', 'products', 'layout_picker', 'admob'])->first();

        return Inertia::render('LayoutPicker/Index', [
            'data' => $user,
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
     * @param  \App\Models\LayoutPicker  $layoutPicker
     * @return \Illuminate\Http\Response
     */
    public function show(LayoutPicker $layoutPicker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayoutPicker  $layoutPicker
     * @return \Illuminate\Http\Response
     */
    public function edit(LayoutPicker $layoutPicker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LayoutPicker  $layoutPicker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LayoutPicker $layoutPicker)
    {
        $request->validate([
            'layout_id_used' => ['integer', 'nullable'],
            'color_scheme_used' => ['string', 'nullable'],
        ]);

        $layoutPicker->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayoutPicker  $layoutPicker
     * @return \Illuminate\Http\Response
     */
    public function destroy(LayoutPicker $layoutPicker)
    {
        //
    }
}
