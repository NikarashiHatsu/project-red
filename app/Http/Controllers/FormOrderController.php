<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FormOrder;

use App\Http\Controllers\ProgressController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FormOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->with(['form_order', 'products', 'admob'])->first();
        
        return \Inertia\Inertia::render('FormOrder/Index', [
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
     * @param int $userId
     */
    public function store($userId)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormOrder  $formOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FormOrder $formOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormOrder  $formOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FormOrder $formOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(FormOrder $formOrder, Request $request)
    {
        // Validasi request
        $request->validate([
            'nama_pemilik' => ['nullable', 'string'],
            'nama_toko' => ['nullable', 'string'],
            'nama_aplikasi' => ['nullable', 'string'],
            'deskripsi_aplikasi' => ['nullable', 'string'],
            'url_website_perusahaan' => ['nullable', 'string'],
            'alamat_perusahaan' => ['nullable', 'string'],
            'facebook_link' => ['nullable', 'string'],
            'instagram_link' => ['nullable', 'string'],
            'twitter_link' => ['nullable', 'string'],
            'youtube_link' => ['nullable', 'string'],
            'whatsapp_number' => ['nullable', 'string'],
        ]);

        // Cari formOrder
        $formOrder = FormOrder::find($request->id);

        // Jika dikonfirmasi
        if($request->confirmed) {
            $progress = new ProgressController;
            $progress->store($request);
        }

        // Jika user request
        if($request->has('requested')) {
            // Ubah status
            $formOrder->update([
                'requested' => $request->requested,
            ]);
        }

        // Upload file jika logo toko ada
        if($request->hasFile('logo_toko_path')) {
            // Validasi
            $request->validate([
                'logo_toko_path' => ['image', 'max:1024', 'mimes:jpeg,jpg,png,bmp'],
            ]);
            
            // Cek jika file ada di database
            if($formOrder->logo_toko_path != null) {
                // Jika ada, hapus, timpa yang baru
                Storage::delete($formOrder->logo_toko_path);
            }

            $newFilename = Str::random(64) . '.' . $request->file('logo_toko_path')->getClientOriginalExtension();
            $request->file('logo_toko_path')->storeAs('public/logo_toko', $newFilename);
            
            $formOrder->update([
                'logo_toko_path' => 'public/logo_toko/' . $newFilename
            ]);
        }

        // Upload file jika banner toko ada
        if($request->hasFile('banner_toko_path')) {
            // Validasi
            $request->validate([
                'banner_toko_path' => ['image', 'max:2048', 'mimes:jpeg,jpg,png,bmp'],
            ]);
            
            // Cek jika file ada di database
            if($formOrder->banner_toko_path != null) {
                // Jika ada, hapus, timpa yang baru
                Storage::delete($formOrder->banner_toko_path);
            }

            $newFilename = Str::random(64) . '.' . $request->file('banner_toko_path')->getClientOriginalExtension();
            $request->file('banner_toko_path')->storeAs('public/banner_toko', $newFilename);
            
            $formOrder->update([
                'banner_toko_path' => 'public/banner_toko/' . $newFilename
            ]);
        }
        
        // Update data
        if($request->has('id')) {
            $formOrder->update($request->except(['logo_toko_path', 'banner_toko_path']));
            return redirect()
                ->back()
                ->with([
                    'success' => 1,
                    'data' => $formOrder
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormOrder  $formOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormOrder $formOrder)
    {
        //
    }
}
