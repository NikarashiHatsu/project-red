<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uncleared = self::retrieve_uncleared_progress();
        $cleared = self::retrieve_cleared_progress();

        return Inertia::render('Admin/Progress/Index', [
            'uncleared' => $uncleared,
            'cleared' => $cleared,
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
        Progress::where('form_order_id', $request->id)->firstOrCreate([
            'form_order_id' => $request->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Progress $progress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        $request->validate([
            'is_apk_created' => ['boolean', 'sometimes'],
            'is_published_on_google_play' => ['boolean', 'sometimes'],
            'google_play_url' => ['string', 'sometimes'],
        ]);
        
        $progress->update(
            $request->all(),
        );

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        //
    }

    /**
     * Retrieve uncleared progress
     */
    private static function retrieve_uncleared_progress()
    {
        return Progress::where(['is_published_on_google_play' => null])->orderBy('updated_at', 'DESC')->with('form_order')->get();
    }

    /**
     * Retrieve cleared progress
     */
    private static function retrieve_cleared_progress()
    {
        return Progress::where(['is_apk_created' => true, 'is_published_on_google_play' => true])->orderBy('updated_at', 'DESC')->with('form_order')->get();
    }
}
