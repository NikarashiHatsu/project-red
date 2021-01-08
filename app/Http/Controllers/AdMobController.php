<?php

namespace App\Http\Controllers;

use App\Models\AdMob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Inertia\Inertia;

class AdMobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->with(['form_order', 'admob'])->firstOrFail();

        return Inertia::render('Admob/Index', [
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
     * @param  \App\Models\AdMob  $adMob
     * @return \Illuminate\Http\Response
     */
    public function show(AdMob $adMob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdMob  $adMob
     * @return \Illuminate\Http\Response
     */
    public function edit(AdMob $adMob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdMob  $adMob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdMob $adMob)
    {
        $request->validate([
            'application_id' => ['required', 'string', 'regex:(ca-app-pub|~)'],
            'ad_unit_id' => ['required', 'string', 'regex:(ca-app-pub|/)'],
        ]);

        $enc_application_id = Crypt::encryptString($request->application_id);
        $enc_ad_unit_id = Crypt::encryptString($request->ad_unit_id);

        $adMob->find($request->id)->update([
            'application_id' => $enc_application_id,
            'ad_unit_id' => $enc_ad_unit_id,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdMob  $adMob
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdMob $adMob)
    {
        //
    }
}
